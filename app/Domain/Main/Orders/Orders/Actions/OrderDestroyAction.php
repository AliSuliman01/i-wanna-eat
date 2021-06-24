<?php


namespace App\Domain\Main\Orders\Orders\Actions;


use App\Domain\Main\Orders\Orders\DTO\OrderDTO;
use App\Domain\Main\Orders\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;

class OrderDestroyAction
{
    public static function execute(
        OrderDTO   $orderDTO
    ){

        $order = Order::find($orderDTO->id);
        $order->delete();
        return $order;
    }
}
