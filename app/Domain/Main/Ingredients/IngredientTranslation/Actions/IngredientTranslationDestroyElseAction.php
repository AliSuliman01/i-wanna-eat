<?php


namespace App\Domain\Main\Ingredients\IngredientTranslation\Actions;

use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;

class IngredientTranslationDestroyElseAction
{
    public static function execute($ingredientId,$ingredientTranslations){
        IngredientTranslation::where('ingredient_id',$ingredientId)->whereNotIn('id',$ingredientTranslations)->delete();
    }
}
