<?php


namespace App\Domain\Main\Orders\Orders\Actions;


use App\Domain\Main\Orders\Orders\DTO\OrderDTO;
use App\Domain\Main\Orders\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;

class OrderUpdateAction
{

    public static function execute(
        OrderDTO $orderDTO
    ){
        $order = Order::find($orderDTO->id);
        $order->update(array_filter($orderDTO->toArray()));
        $order->save();
        return $order;
    }
}
