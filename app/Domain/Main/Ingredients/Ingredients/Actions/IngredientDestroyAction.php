<?php


namespace App\Domain\Main\Ingredients\Ingredients\Actions;


use App\Domain\Main\Ingredients\Ingredients\DTO\IngredientDTO;
use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientDestroyAction
{
    public static function execute(
        IngredientDTO   $ingredientDTO
    ){

        $ingredient = Ingredient::find($ingredientDTO->id);
        $ingredient->delete();
        return $ingredient;
    }
}
