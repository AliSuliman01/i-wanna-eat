<?php


namespace App\Http\ViewModels\Main\Products\ProductOrder;

use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use Illuminate\Contracts\Support\Arrayable;


class ProductOrderShowVM implements Arrayable
{

    private $productOrderId;

    public function __construct($props)
    {
        $this->productOrderId = $props['id'] ;
    }

    private function get_ProductOrder(){
        return ProductOrder::find($this->productOrderId);
    }
    public function toArray(): array
    {
        return  $this->get_ProductOrder()->toArray();
    }
}
