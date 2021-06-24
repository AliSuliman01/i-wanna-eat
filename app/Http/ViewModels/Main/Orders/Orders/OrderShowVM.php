<?php


namespace App\Http\ViewModels\Main\Orders\Orders;

use App\Domain\Main\Orders\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;


class OrderShowVM implements Arrayable
{

    private $orderId;

    public function __construct($props)
    {
        $this->orderId = $props['id'] ;
    }

    private function get_Order(){
        return Order::find($this->orderId);
    }
    public function toArray(): array
    {
        return  $this->get_Order()->toArray();
    }
}
