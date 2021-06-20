<?php


namespace App\Domain\Main\Restaurants\Restaurants\Actions;


use App\Domain\Main\Restaurants\Restaurants\DTO\RestaurantDTO;
use App\Domain\Main\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantCreateAction
{
    public static function execute(
        RestaurantDTO $restaurantDTO
    ){

        $restaurant = new Restaurant($restaurantDTO->toArray());
        $restaurant->save();
        return $restaurant;
    }
}
