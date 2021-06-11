<?php


namespace App\Domain\Content\Restaurants\Restaurants\Actions;


use App\Domain\Content\Restaurants\Restaurants\DTO\RestaurantDTO;
use App\Domain\Content\Restaurants\Restaurants\Model\Restaurant;
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
