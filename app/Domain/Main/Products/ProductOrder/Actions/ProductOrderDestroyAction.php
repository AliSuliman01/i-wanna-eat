<?php


namespace App\Domain\Main\Products\ProductOrder\Actions;


use App\Domain\Main\Products\ProductOrder\DTO\ProductOrderDTO;
use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use Illuminate\Support\Facades\Auth;

class ProductOrderDestroyAction
{
    public static function execute(
        ProductOrderDTO   $productOrderDTO
    ){

        $productOrder = ProductOrder::find($productOrderDTO->id);
        $productOrder->delete();
        return $productOrder;
    }
}
