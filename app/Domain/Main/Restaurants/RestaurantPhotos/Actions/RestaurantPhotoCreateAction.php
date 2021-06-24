<?php


namespace App\Domain\Main\Restaurants\RestaurantPhotos\Actions;


use App\Domain\Main\Restaurants\RestaurantPhotos\DTO\RestaurantPhotoDTO;
use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Illuminate\Support\Facades\Auth;

class RestaurantPhotoCreateAction
{
    public static function execute(
        RestaurantPhotoDTO $restaurantPhotoDTO
    ){

        $restaurantPhoto = new RestaurantPhoto($restaurantPhotoDTO->toArray());
        $restaurantPhoto->save();
        return $restaurantPhoto;
    }
}
