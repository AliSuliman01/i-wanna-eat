<?php


namespace App\Domain\Main\Products\Products\Actions;


use App\Domain\Main\Products\Products\DTO\ProductDTO;
use App\Domain\Main\Products\Products\Model\Product;
use Illuminate\Support\Facades\Auth;

class ProductDestroyAction
{
    public static function execute(
        ProductDTO   $productDTO
    ){

        $product = Product::find($productDTO->id);
        $product->delete();
        return $product;
    }
}
