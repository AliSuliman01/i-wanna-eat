<?php


namespace App\Domain\Main\Products\ProductOrder\Actions;


use App\Domain\Main\Products\ProductOrder\DTO\ProductOrderDTO;
use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use Illuminate\Support\Facades\Auth;

class ProductOrderUpdateAction
{

    public static function execute(
        ProductOrderDTO $productOrderDTO
    ){
        $productOrder = ProductOrder::find($productOrderDTO->id);
        $productOrder->update(array_filter($productOrderDTO->toArray()));
        $productOrder->save();
        return $productOrder;
    }
}
