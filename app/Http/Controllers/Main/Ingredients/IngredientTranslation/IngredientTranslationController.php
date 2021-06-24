<?php


namespace App\Http\Controllers\Main\Ingredients\IngredientTranslation;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Ingredients\IngredientTranslation\Actions\IngredientTranslationCreateAction;
use App\Domain\Main\Ingredients\IngredientTranslation\Actions\IngredientTranslationDestroyAction;
use App\Domain\Main\Ingredients\IngredientTranslation\Actions\IngredientTranslationUpdateAction;
use App\Domain\Main\Ingredients\IngredientTranslation\DTO\IngredientTranslationDTO;
use App\Http\Requests\Main\Ingredients\IngredientTranslation\IngredientTranslationCreateRequest;
use App\Http\Requests\Main\Ingredients\IngredientTranslation\IngredientTranslationUpdateRequest;
use App\Http\Requests\Main\Ingredients\IngredientTranslation\IngredientTranslationDestroyRequest;
use App\Http\Requests\Main\Ingredients\IngredientTranslation\IngredientTranslationShowRequest;
use App\Http\ViewModels\Main\Ingredients\IngredientTranslation\IngredientTranslationShowVM;
use App\Http\ViewModels\Main\Ingredients\IngredientTranslation\IngredientTranslationIndexVM;

class IngredientTranslationController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new IngredientTranslationIndexVM())->toArray()));
    }

    public function show(IngredientTranslationShowRequest $ingredientTranslationShowRequest){
      
        return response()->json(Helpers::createSuccessResponse((new IngredientTranslationShowVM(['id' => $ingredientTranslationShowRequest->route('id')]))->toArray()));
    }

    public function create(IngredientTranslationCreateRequest $ingredientTranslationCreateRequest){
        $data = $ingredientTranslationCreateRequest->validated() ;

        $ingredientTranslationDTO = IngredientTranslationDTO::fromRequest($data);
        
        $ingredientTranslation = IngredientTranslationCreateAction::execute($ingredientTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new IngredientTranslationShowVM($ingredientTranslation->toArray()))->toArray()));
    }

    public function update(IngredientTranslationUpdateRequest $ingredientTranslationUpdateRequest){
        $data = $ingredientTranslationUpdateRequest->validated() ;

        $ingredientTranslationDTO = IngredientTranslationDTO::fromRequest($data);
        
        $ingredientTranslation = IngredientTranslationUpdateAction::execute($ingredientTranslationDTO);

        return response()->json(Helpers::createSuccessResponse((new IngredientTranslationShowVM($ingredientTranslation->toArray()))->toArray()));
    }

    public function destroy(IngredientTranslationDestroyRequest $ingredientTranslationDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(IngredientTranslationDestroyAction::execute(IngredientTranslationDTO::fromRequest($ingredientTranslationDestroyRequest->validated()))));
    }

}
