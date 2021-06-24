<?php


namespace App\Domain\Main\Restaurants\RestaurantPhotos\Actions;


use App\Domain\Main\Restaurants\RestaurantPhotos\DTO\RestaurantPhotoDTO;
use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Illuminate\Support\Facades\Auth;

class RestaurantPhotoDestroyAction
{
    public static function execute(
        RestaurantPhotoDTO   $restaurantPhotoDTO
    ){

        $restaurantPhoto = RestaurantPhoto::find($restaurantPhotoDTO->id);
        $restaurantPhoto->delete();
        return $restaurantPhoto;
    }
}
