<?php


namespace App\Domain\Main\Products\Products\Actions;


use App\Domain\Main\Products\Products\DTO\ProductDTO;
use App\Domain\Main\Products\Products\Model\Product;
use Illuminate\Support\Facades\Auth;

class ProductUpdateAction
{

    public static function execute(
        ProductDTO $productDTO
    ){
        $product = Product::find($productDTO->id);
        $product->update(array_filter($productDTO->toArray()));
        $product->save();
        return $product;
    }
}
