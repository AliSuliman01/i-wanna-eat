<?php


namespace App\Http\Controllers\Main\Products\ProductTranslation;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Products\ProductTranslation\Actions\ProductTranslationCreateAction;
use App\Domain\Main\Products\ProductTranslation\Actions\ProductTranslationDestroyAction;
use App\Domain\Main\Products\ProductTranslation\Actions\ProductTranslationUpdateAction;
use App\Domain\Main\Products\ProductTranslation\DTO\ProductTranslationDTO;
use App\Http\Requests\Main\Products\ProductTranslation\ProductTranslationCreateRequest;
use App\Http\Requests\Main\Products\ProductTranslation\ProductTranslationUpdateRequest;
use App\Http\Requests\Main\Products\ProductTranslation\ProductTranslationDestroyRequest;
use App\Http\Requests\Main\Products\ProductTranslation\ProductTranslationShowRequest;
use App\Http\ViewModels\Main\Products\ProductTranslation\ProductTranslationShowVM;
use App\Http\ViewModels\Main\Products\ProductTranslation\ProductTranslationIndexVM;

class ProductTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ProductTranslationIndexVM())->toArray()));
    }

    public function show(ProductTranslationShowRequest $productTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ProductTranslationShowVM(['id' => $productTranslationShowRequest->route('id')]))->toArray()));
    }

    public function create(ProductTranslationCreateRequest $productTranslationCreateRequest){
        $data = $productTranslationCreateRequest->validated() ;

        $productTranslationDTO = ProductTranslationDTO::fromRequest($data);
        
        $productTranslation = ProductTranslationCreateAction::execute($productTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductTranslationShowVM($productTranslation->toArray()))->toArray()));
    }

    public function update(ProductTranslationUpdateRequest $productTranslationUpdateRequest){
        $data = $productTranslationUpdateRequest->validated() ;

        $productTranslationDTO = ProductTranslationDTO::fromRequest($data);
        
        $productTranslation = ProductTranslationUpdateAction::execute($productTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductTranslationShowVM($productTranslation->toArray()))->toArray()));
    }

    public function destroy(ProductTranslationDestroyRequest $productTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ProductTranslationDestroyAction::execute(ProductTranslationDTO::fromRequest($productTranslationDestroyRequest->validated()))));
    }

}
