<?php


namespace App\Http\ViewModels\Main\Orders\Orders;

use App\Domain\Main\Orders\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class OrderIndexVM implements Arrayable
{

    public function get_orders(){
    	return Order::with(['products','services'])->get();
	}
    public function toArray(): array
    {
        return $this->get_orders()->toArray();
    }
}
