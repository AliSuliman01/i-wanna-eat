<?php


namespace App\Domain\Main\Products\ProductOrder\Actions;


use App\Domain\Main\Products\ProductOrder\DTO\ProductOrderDTO;
use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use Illuminate\Support\Facades\Auth;

class ProductOrderCreateAction
{
    public static function execute(
        ProductOrderDTO $productOrderDTO
    ){

        $productOrder = new ProductOrder($productOrderDTO->toArray());
        $productOrder->save();
        return $productOrder;
    }
}
