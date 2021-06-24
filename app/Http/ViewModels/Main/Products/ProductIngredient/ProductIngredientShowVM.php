<?php


namespace App\Http\ViewModels\Main\Products\ProductIngredient;

use App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient;
use Illuminate\Contracts\Support\Arrayable;


class ProductIngredientShowVM implements Arrayable
{

    private $productIngredientId;

    public function __construct($props)
    {
        $this->productIngredientId = $props['id'] ;
    }

    private function get_ProductIngredient(){
        return ProductIngredient::find($this->productIngredientId);
    }
    public function toArray(): array
    {
        return  $this->get_ProductIngredient()->toArray();
    }
}
