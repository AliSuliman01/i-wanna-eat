<?php


namespace App\Domain\Main\Restaurants\RestaurantPhotos\Actions;

use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;

class RestaurantPhotosDestroyElseAction
{
    public static function execute($restaurantId,$restaurantPhotos){
        RestaurantPhoto::where('restaurant_id',$restaurantId)->whereNotIn('id',$restaurantPhotos)->delete();
    }
}
