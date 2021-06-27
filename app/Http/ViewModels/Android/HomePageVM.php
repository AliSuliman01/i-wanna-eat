<?php

namespace App\Http\ViewModels\Android;

use App\Domain\Main\Categories\Categories\Model\Category;
use App\Domain\Main\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;

class HomePageVM implements Arrayable
{

    public function get_restaurants(){
        return Restaurant::with(['photos'])->get();
    }
    public function get_categories(){
        return Category::with(['translations','photos'])->get();
    }
    public function toArray()
    {
        return [
            'restaurants' => $this->get_restaurants(),
            'categories' => $this->get_categories(),
        ];
    }
}
