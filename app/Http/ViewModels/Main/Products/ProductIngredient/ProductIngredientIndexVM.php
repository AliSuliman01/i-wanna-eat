<?php


namespace App\Http\ViewModels\Main\Products\ProductIngredient;

use App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient;
use Illuminate\Contracts\Support\Arrayable;

class ProductIngredientIndexVM implements Arrayable
{

    public function get_product_ingredient(){
    	return ProductIngredient::all();
	}
    public function toArray(): array
    {
        return $this->get_product_ingredient()->toArray();
    }
}
