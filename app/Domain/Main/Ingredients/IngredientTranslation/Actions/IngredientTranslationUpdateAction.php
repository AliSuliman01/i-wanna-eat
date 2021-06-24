<?php


namespace App\Domain\Main\Ingredients\IngredientTranslation\Actions;


use App\Domain\Main\Ingredients\IngredientTranslation\DTO\IngredientTranslationDTO;
use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;
use Illuminate\Support\Facades\Auth;

class IngredientTranslationUpdateAction
{

    public static function execute(
        IngredientTranslationDTO $ingredientTranslationDTO
    ){
        $ingredientTranslation = IngredientTranslation::find($ingredientTranslationDTO->id);
        $ingredientTranslation->update(array_filter($ingredientTranslationDTO->toArray()));
        $ingredientTranslation->save();
        return $ingredientTranslation;
    }
}
