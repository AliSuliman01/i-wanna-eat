<?php


namespace App\Http\Controllers\Main\Products\Products;


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

        return response()->json(Helpers::createSuccessResponse((new ProductShowVM($product->toArray()))->toArray()));
    }

    public function update(ProductUpdateRequest $productUpdateRequest){
        $data = $productUpdateRequest->validated() ;

        $productDTO = ProductDTO::fromRequest($data);
        
        $product = ProductUpdateAction::execute($productDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductShowVM($product->toArray()))->toArray()));
    }

    public function destroy(ProductDestroyRequest $productDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ProductDestroyAction::execute(ProductDTO::fromRequest($productDestroyRequest->validated()))));
    }

}
