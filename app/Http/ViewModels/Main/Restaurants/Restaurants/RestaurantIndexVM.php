<?php


namespace App\Http\ViewModels\Main\Restaurants\Restaurants;

use App\Domain\Main\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;

class RestaurantIndexVM implements Arrayable
{

    public function get_restaurants(){
    	return Restaurant::with(['region'])->get();
	}
    public function toArray(): array
    {
        return $this->get_restaurants()->toArray();
    }
}
