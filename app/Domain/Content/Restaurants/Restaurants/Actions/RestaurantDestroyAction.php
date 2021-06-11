<?php


namespace App\Domain\Content\Restaurants\Restaurants\Actions;


use App\Domain\Content\Restaurants\Restaurants\DTO\RestaurantDTO;
use App\Domain\Content\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantDestroyAction
{
    public static function execute(
        RestaurantDTO   $restaurantDTO
    ){

        $restaurant = Restaurant::find($restaurantDTO->id);
        $restaurant->delete();
        return $restaurant;
    }
}
