<?php


namespace App\Domain\Main\Restaurants\Restaurants\Actions;


use App\Domain\Main\Restaurants\Restaurants\DTO\RestaurantDTO;
use App\Domain\Main\Restaurants\Restaurants\Model\Restaurant;
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
