<?php


namespace App\Http\Controllers\Main\Products\Products;


use App\Domain\Main\Products\ProductPhotos\Actions\ProductPhotoCreateAction;
use App\Domain\Main\Products\ProductPhotos\Actions\ProductPhotoDestroyElseAction;
use App\Domain\Main\Products\ProductPhotos\Actions\ProductPhotoUpdateAction;
use App\Domain\Main\Products\ProductPhotos\DTO\ProductPhotoDTO;
use App\Domain\Main\Products\ProductTranslation\Actions\ProductTranslationCreateAction;
use App\Domain\Main\Products\ProductTranslation\Actions\ProductTranslationDestroyElseAction;
use App\Domain\Main\Products\ProductTranslation\Actions\ProductTranslationUpdateAction;
use App\Domain\Main\Products\ProductTranslation\DTO\ProductTranslationDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Products\Products\Actions\ProductCreateAction;
use App\Domain\Main\Products\Products\Actions\ProductDestroyAction;
use App\Domain\Main\Products\Products\Actions\ProductUpdateAction;
use App\Domain\Main\Products\Products\DTO\ProductDTO;
use App\Http\Requests\Main\Products\Products\ProductCreateRequest;
use App\Http\Requests\Main\Products\Products\ProductUpdateRequest;
use App\Http\Requests\Main\Products\Products\ProductDestroyRequest;
use App\Http\Requests\Main\Products\Products\ProductShowRequest;
use App\Http\ViewModels\Main\Products\Products\ProductShowVM;
use App\Http\ViewModels\Main\Products\Products\ProductIndexVM;

class ProductController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ProductIndexVM())->toArray()));
    }

    public function show(ProductShowRequest $productShowRequest){

        return response()->json(Helpers::createSuccessResponse((new ProductShowVM(['id' => $productShowRequest->route('id')]))->toArray()));
    }

    public function create(ProductCreateRequest $productCreateRequest){
        $data = $productCreateRequest->validated() ;
        $productDTO = ProductDTO::fromRequest($data);
        $product = ProductCreateAction::execute($productDTO);


        foreach ($data['translations'] as $translation){
            ProductTranslationCreateAction::execute(ProductTranslationDTO::fromRequest($translation + ['product_id' => $product->id]));
        }

        $product->ingredients()->attach($data['ingredients']);

        foreach ($data['photos'] ?? [] as $photo){
            ProductPhotoCreateAction::execute(ProductPhotoDTO::fromRequest($photo + ['product_id' => $product->id]));
        }

        return response()->json(Helpers::createSuccessResponse((new ProductShowVM($product->toArray()))->toArray()));
    }

    public function update(ProductUpdateRequest $productUpdateRequest){
        $data = $productUpdateRequest->validated() ;
        $productDTO = ProductDTO::fromRequest($data);
        $product = ProductUpdateAction::execute($productDTO);


        $productTranslations = [];
        foreach ($data['translations'] ?? [] as $translation){
            isset($translation['id']) ?
                $productTranslation = ProductTranslationUpdateAction::execute(ProductTranslationDTO::fromRequest($translation)):
                $productTranslation = ProductTranslationCreateAction::execute(ProductTranslationDTO::fromRequest($translation + ['product_id' => $product->id]));
            $productTranslations += $productTranslation->id;
        }
        ProductTranslationDestroyElseAction::execute($product->id,$productTranslations);

        $product->ingredients()->sync($data['ingredients']);

        $productPhotos = [];
        foreach ($data['photos'] ?? [] as $photo){
            isset($photo['id']) ?
                $productPhoto = ProductPhotoUpdateAction::execute(ProductPhotoDTO::fromRequest($photo)):
                $productPhoto = ProductPhotoCreateAction::execute(ProductPhotoDTO::fromRequest($photo + ['product_id' => $product->id]));
            $productPhotos += $productPhoto->id;
        }
        ProductPhotoDestroyElseAction::execute($product->id,$productPhotos);

        return response()->json(Helpers::createSuccessResponse((new ProductShowVM($product->toArray()))->toArray()));
    }

    public function destroy(ProductDestroyRequest $productDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ProductDestroyAction::execute(ProductDTO::fromRequest($productDestroyRequest->validated()))));
    }

}
