<?php


namespace App\Domain\Main\Ingredients\Ingredients\Actions;


use App\Domain\Main\Ingredients\Ingredients\DTO\IngredientDTO;
use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientUpdateAction
{

    public static function execute(
        IngredientDTO $ingredientDTO
    ){
        $ingredient = Ingredient::find($ingredientDTO->id);
        $ingredient->update(array_filter($ingredientDTO->toArray()));
        $ingredient->save();
        return $ingredient;
    }
}
