<?php


namespace App\Domain\Main\Ingredients\Ingredients\Actions;


use App\Domain\Main\Ingredients\Ingredients\DTO\IngredientDTO;
use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientCreateAction
{
    public static function execute(
        IngredientDTO $ingredientDTO
    ){

        $ingredient = new Ingredient($ingredientDTO->toArray());
        $ingredient->save();
        return $ingredient;
    }
}
