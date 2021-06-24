<?php


namespace App\Domain\Main\Products\ProductIngredient\Actions;


use App\Domain\Main\Products\ProductIngredient\DTO\ProductIngredientDTO;
use App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient;
use Illuminate\Support\Facades\Auth;

class ProductIngredientCreateAction
{
    public static function execute(
        ProductIngredientDTO $productIngredientDTO
    ){

        $productIngredient = new ProductIngredient($productIngredientDTO->toArray());
        $productIngredient->save();
        return $productIngredient;
    }
}
