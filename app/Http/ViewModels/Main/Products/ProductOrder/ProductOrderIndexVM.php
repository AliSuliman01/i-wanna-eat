<?php


namespace App\Http\ViewModels\Main\Products\ProductOrder;

use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use Illuminate\Contracts\Support\Arrayable;

class ProductOrderIndexVM implements Arrayable
{

    public function get_product_order(){
    	return ProductOrder::all();
	}
    public function toArray(): array
    {
        return $this->get_product_order()->toArray();
    }
}
