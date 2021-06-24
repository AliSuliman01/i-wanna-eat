<?php


namespace App\Domain\Main\Restaurants\RestaurantPhotos\Actions;


use App\Domain\Main\Restaurants\RestaurantPhotos\DTO\RestaurantPhotoDTO;
use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Illuminate\Support\Facades\Auth;

class RestaurantPhotoUpdateAction
{

    public static function execute(
        RestaurantPhotoDTO $restaurantPhotoDTO
    ){
        $restaurantPhoto = RestaurantPhoto::find($restaurantPhotoDTO->id);
        $restaurantPhoto->update(array_filter($restaurantPhotoDTO->toArray()));
        $restaurantPhoto->save();
        return $restaurantPhoto;
    }
}
