<?php


namespace App\Http\Controllers\Main\Products\ProductIngredient;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Products\ProductIngredient\Actions\ProductIngredientCreateAction;
use App\Domain\Main\Products\ProductIngredient\Actions\ProductIngredientDestroyAction;
use App\Domain\Main\Products\ProductIngredient\Actions\ProductIngredientUpdateAction;
use App\Domain\Main\Products\ProductIngredient\DTO\ProductIngredientDTO;
use App\Http\Requests\Main\Products\ProductIngredient\ProductIngredientCreateRequest;
use App\Http\Requests\Main\Products\ProductIngredient\ProductIngredientUpdateRequest;
use App\Http\Requests\Main\Products\ProductIngredient\ProductIngredientDestroyRequest;
use App\Http\Requests\Main\Products\ProductIngredient\ProductIngredientShowRequest;
use App\Http\ViewModels\Main\Products\ProductIngredient\ProductIngredientShowVM;
use App\Http\ViewModels\Main\Products\ProductIngredient\ProductIngredientIndexVM;

class ProductIngredientController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ProductIngredientIndexVM())->toArray()));
    }

    public function show(ProductIngredientShowRequest $productIngredientShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new ProductIngredientShowVM(['id' => $productIngredientShowRequest->route('id')]))->toArray()));
    }

    public function create(ProductIngredientCreateRequest $productIngredientCreateRequest){
        $data = $productIngredientCreateRequest->validated() ;

        $productIngredientDTO = ProductIngredientDTO::fromRequest($data);
        
        $productIngredient = ProductIngredientCreateAction::execute($productIngredientDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductIngredientShowVM($productIngredient->toArray()))->toArray()));
    }

    public function update(ProductIngredientUpdateRequest $productIngredientUpdateRequest){
        $data = $productIngredientUpdateRequest->validated() ;

        $productIngredientDTO = ProductIngredientDTO::fromRequest($data);
        
        $productIngredient = ProductIngredientUpdateAction::execute($productIngredientDTO);

        return response()->json(Helpers::createSuccessResponse((new ProductIngredientShowVM($productIngredient->toArray()))->toArray()));
    }

    public function destroy(ProductIngredientDestroyRequest $productIngredientDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(ProductIngredientDestroyAction::execute(ProductIngredientDTO::fromRequest($productIngredientDestroyRequest->validated()))));
    }

}
