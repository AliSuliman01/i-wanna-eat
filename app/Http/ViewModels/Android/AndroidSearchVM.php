<?php


namespace App\Http\ViewModels\Android;


use App\Domain\Main\Categories\Categories\Model\Category;
use App\Domain\Main\Products\Products\Model\Product;
use App\Domain\Main\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;

class AndroidSearchVM implements Arrayable
{
    private $sub_string ;

    public function __construct($props)
    {
        $this->sub_string = $props['sub_string'];
    }

    public function get_restaurants(){
        return Restaurant::with(['photos'])->whereRaw('LOWER(name) LIKE ?',['%'.trim(strtolower($this->sub_string)).'%'])->get();
    }
    public function get_products(){
        return Product::with(['translations','photos'])->whereHas('translations',function ($translation){
            $translation->whereRaw('LOWER(product_translation.name) LIKE ?',['%'.trim(strtolower($this->sub_string)).'%']);
        })->get();
    }
    public function get_categories(){
        return Category::with(['translations','photos'])->whereHas('translations',function ($translation){
                $translation->whereRaw('LOWER(category_translation.name) LIKE ?',['%'.trim(strtolower($this->sub_string)).'%']);
            })->get();
    }
    public function toArray()
    {
        return [
            'restaurants' => $this->get_restaurants(),
            'products' => $this->get_products(),
            'categories' => $this->get_categories(),
        ];
    }
}
