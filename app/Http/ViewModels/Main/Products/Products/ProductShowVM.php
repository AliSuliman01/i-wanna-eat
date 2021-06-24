<?php


namespace App\Http\ViewModels\Main\Products\Products;

use App\Domain\Main\Products\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;


class ProductShowVM implements Arrayable
{

    private $productId;

    public function __construct($props)
    {
        $this->productId = $props['id'] ;
    }

    private function get_Product(){
        return Product::find($this->productId);
    }
    public function toArray(): array
    {
        return  $this->get_Product()->toArray();
    }
}
