<?php


namespace App\Domain\Main\Ingredients\IngredientTranslation\Actions;


use App\Domain\Main\Ingredients\IngredientTranslation\DTO\IngredientTranslationDTO;
use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;
use Illuminate\Support\Facades\Auth;

class IngredientTranslationCreateAction
{
    public static function execute(
        IngredientTranslationDTO $ingredientTranslationDTO
    ){

        $ingredientTranslation = new IngredientTranslation($ingredientTranslationDTO->toArray());
        $ingredientTranslation->save();
        return $ingredientTranslation;
    }
}
