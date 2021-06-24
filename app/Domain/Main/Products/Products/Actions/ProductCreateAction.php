<?php


namespace App\Domain\Main\Products\Products\Actions;


use App\Domain\Main\Products\Products\DTO\ProductDTO;
use App\Domain\Main\Products\Products\Model\Product;
use Illuminate\Support\Facades\Auth;

class ProductCreateAction
{
    public static function execute(
        ProductDTO $productDTO
    ){

        $product = new Product($productDTO->toArray());
        $product->save();
        return $product;
    }
}
