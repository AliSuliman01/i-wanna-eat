<?php


namespace App\Http\ViewModels\Main\Products\Products;

use App\Domain\Main\Products\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;

class ProductIndexVM implements Arrayable
{

    public function get_products(){
    	return Product::all();
	}
    public function toArray(): array
    {
        return $this->get_products()->toArray();
    }
}
