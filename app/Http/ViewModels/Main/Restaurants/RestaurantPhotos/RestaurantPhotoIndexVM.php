<?php


namespace App\Http\ViewModels\Main\Restaurants\RestaurantPhotos;

use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Illuminate\Contracts\Support\Arrayable;

class RestaurantPhotoIndexVM implements Arrayable
{

    public function get_restaurant_photos(){
    	return RestaurantPhoto::all();
	}
    public function toArray(): array
    {
        return $this->get_restaurant_photos();
    }
}
