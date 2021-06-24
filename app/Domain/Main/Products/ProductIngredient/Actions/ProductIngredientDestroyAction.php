<?php


namespace App\Domain\Main\Products\ProductIngredient\Actions;


use App\Domain\Main\Products\ProductIngredient\DTO\ProductIngredientDTO;
use App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient;
use Illuminate\Support\Facades\Auth;

class ProductIngredientDestroyAction
{
    public static function execute(
        ProductIngredientDTO   $productIngredientDTO
    ){

        $productIngredient = ProductIngredient::find($productIngredientDTO->id);
        $productIngredient->delete();
        return $productIngredient;
    }
}
