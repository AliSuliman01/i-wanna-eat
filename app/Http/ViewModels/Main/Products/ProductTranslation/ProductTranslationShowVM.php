<?php


namespace App\Http\ViewModels\Main\Products\ProductTranslation;

use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Contracts\Support\Arrayable;


class ProductTranslationShowVM implements Arrayable
{

    private $productTranslationId;

    public function __construct($props)
    {
        $this->productTranslationId = $props['id'] ;
    }

    private function get_ProductTranslation(){
        return ProductTranslation::find($this->productTranslationId);
    }
    public function toArray(): array
    {
        return  $this->get_ProductTranslation()->toArray();
    }
}
