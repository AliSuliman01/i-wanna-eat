<?php


namespace App\Http\ViewModels\Content\Restaurants\Restaurants;

use App\Domain\Content\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Contracts\Support\Arrayable;

class RestaurantIndexVM implements Arrayable
{

    public function get_restaurants(){
    	return Restaurant::all();
	}
    public function toArray(): array
    {
        return [
            'restaurants' => $this->get_restaurants()
        ];
    }
}
