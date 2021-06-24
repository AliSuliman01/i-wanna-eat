<?php


namespace App\Http\ViewModels\Main\Products\ProductTranslation;

use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Contracts\Support\Arrayable;

class ProductTranslationIndexVM implements Arrayable
{

    public function get_product_translation(){
    	return ProductTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_product_translation()->toArray();
    }
}
