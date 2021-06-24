<?php


namespace App\Http\Controllers\Main\Products\ProductPhotos;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Products\ProductPhotos\Actions\ProductPhotoCreateAction;
use App\Domain\Main\Products\ProductPhotos\Actions\ProductPhotoDestroyAction;
use App\Domain\Main\Products\ProductPhotos\Actions\ProductPhotoUpdateAction;
use App\Domain\Main\Products\ProductPhotos\DTO\ProductPhotoDTO;
use App\Http\Requests\Main\Products\ProductPhotos\ProductPhotoCreateRequest;
use App\Http\Requests\Main\Products\ProductPhotos\ProductPhotoUpdateRequest;
use App\Http\Requests\Main\Products\ProductPhotos\ProductPhotoDestroyRequest;
use App\Http\Requests\Main\Products\ProductPhotos\ProductPhotoShowRequest;
use App\Http\ViewModels\Main\Products\ProductPhotos\ProductPhotoShowVM;
use App\Http\ViewModels\Main\Products\ProductPhotos\ProductPhotoIndexVM;

class ProductPhotoController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ProductPhotoIndexVM())->toArray()));
    }

    public function show(ProductPhotoShowRequest $productPhotoShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ProductPhotoShowVM(['id' => $productPhotoShowRequest->route('id')]))->toArray()));
    }

    public function create(ProductPhotoCreateRequest $productPhotoCreateRequest){
        $data = $productPhotoCreateRequest->validated() ;

        $productPhotoDTO = ProductPhotoDTO::fromRequest($data);
        
        $productPhoto = ProductPhotoCreateAction::execute($productPhotoDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductPhotoShowVM($productPhoto->toArray()))->toArray()));
    }

    public function update(ProductPhotoUpdateRequest $productPhotoUpdateRequest){
        $data = $productPhotoUpdateRequest->validated() ;

        $productPhotoDTO = ProductPhotoDTO::fromRequest($data);
        
        $productPhoto = ProductPhotoUpdateAction::execute($productPhotoDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductPhotoShowVM($productPhoto->toArray()))->toArray()));
    }

    public function destroy(ProductPhotoDestroyRequest $productPhotoDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ProductPhotoDestroyAction::execute(ProductPhotoDTO::fromRequest($productPhotoDestroyRequest->validated()))));
    }

}
