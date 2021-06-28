<?php


namespace App\Http\Controllers\Main\Ingredients\Ingredients;


use App\Domain\Main\Ingredients\IngredientTranslation\Actions\IngredientTranslationCreateAction;
use App\Domain\Main\Ingredients\IngredientTranslation\Actions\IngredientTranslationDestroyElseAction;
use App\Domain\Main\Ingredients\IngredientTranslation\Actions\IngredientTranslationUpdateAction;
use App\Domain\Main\Ingredients\IngredientTranslation\DTO\IngredientTranslationDTO;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Main\Ingredients\Ingredients\Actions\IngredientCreateAction;
use App\Domain\Main\Ingredients\Ingredients\Actions\IngredientDestroyAction;
use App\Domain\Main\Ingredients\Ingredients\Actions\IngredientUpdateAction;
use App\Domain\Main\Ingredients\Ingredients\DTO\IngredientDTO;
use App\Http\Requests\Main\Ingredients\Ingredients\IngredientCreateRequest;
use App\Http\Requests\Main\Ingredients\Ingredients\IngredientUpdateRequest;
use App\Http\Requests\Main\Ingredients\Ingredients\IngredientDestroyRequest;
use App\Http\Requests\Main\Ingredients\Ingredients\IngredientShowRequest;
use App\Http\ViewModels\Main\Ingredients\Ingredients\IngredientShowVM;
use App\Http\ViewModels\Main\Ingredients\Ingredients\IngredientIndexVM;

class IngredientController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new IngredientIndexVM())->toArray()));
    }

    public function show(IngredientShowRequest $ingredientShowRequest){

        return response()->json(Helpers::createSuccessResponse((new IngredientShowVM(['id' => $ingredientShowRequest->route('id')]))->toArray()));
    }

    public function create(IngredientCreateRequest $ingredientCreateRequest){
        $data = $ingredientCreateRequest->validated() ;
        $ingredientDTO = IngredientDTO::fromRequest($data);
        $ingredient = IngredientCreateAction::execute($ingredientDTO);

        foreach ($data['translations'] as $translation){
            IngredientTranslationCreateAction::execute(IngredientTranslationDTO::fromRequest($translation + ['$ingredient_id' => $ingredient->id]));
        }

        return response()->json(Helpers::createSuccessResponse((new IngredientShowVM($ingredient->toArray()))->toArray()));
    }

    public function update(IngredientUpdateRequest $ingredientUpdateRequest){
        $data = $ingredientUpdateRequest->validated() ;
        $ingredientDTO = IngredientDTO::fromRequest($data);
        $ingredient = IngredientUpdateAction::execute($ingredientDTO);

        if(isset($data['translations'])) {
            $ingredientTranslations = [];
            foreach ($data['translations'] ?? [] as $translation) {
                isset($translation['id']) ?
                    $ingredientTranslation = IngredientTranslationUpdateAction::execute(IngredientTranslationDTO::fromRequest($translation)) :
                    $ingredientTranslation = IngredientTranslationCreateAction::execute(IngredientTranslationDTO::fromRequest($translation + ['ingredient_id' => $ingredient->id]));
                array_push($ingredientTranslations, $ingredientTranslation->id);
            }
            IngredientTranslationDestroyElseAction::execute($ingredient->id, $ingredientTranslations);
        }
        return response()->json(Helpers::createSuccessResponse((new IngredientShowVM($ingredient->toArray()))->toArray()));
    }

    public function destroy(IngredientDestroyRequest $ingredientDestroyRequest){

        return response()->json(Helpers::createSuccessResponse(IngredientDestroyAction::execute(IngredientDTO::fromRequest($ingredientDestroyRequest->validated()))));
    }

}
