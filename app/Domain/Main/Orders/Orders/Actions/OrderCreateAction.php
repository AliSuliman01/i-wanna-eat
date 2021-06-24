<?php


namespace App\Domain\Main\Orders\Orders\Actions;


use App\Domain\Main\Orders\Orders\DTO\OrderDTO;
use App\Domain\Main\Orders\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;

class OrderCreateAction
{
    public static function execute(
        OrderDTO $orderDTO
    ){

        $order = new Order($orderDTO->toArray());
        $order->save();
        return $order;
    }
}
