<?php


namespace App\Domain\Main\Restaurants\RestaurantPhotos\Observer;

use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Illuminate\Support\Facades\Auth;


class RestaurantPhotoObserver
{
	  /**
     * Handle the RestaurantPhoto "created" event.
     *
     * @param  \App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto  $restaurantPhoto
     * @return void
     */
    public function created(RestaurantPhoto $restaurantPhoto)
    {
        $restaurantPhoto->created_by_user_id = Auth::id();
    }

    /**
     * Handle the RestaurantPhoto "updated" event.
     *
     * @param  \App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto  $restaurantPhoto
     * @return void
     */
    public function updated(RestaurantPhoto $restaurantPhoto)
    {
        $restaurantPhoto->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the RestaurantPhoto "deleted" event.
     *
     * @param  \App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto  $restaurantPhoto
     * @return void
     */
    public function deleted(RestaurantPhoto $restaurantPhoto)
    {
        $restaurantPhoto->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the RestaurantPhoto "restored" event.
     *
     * @param  \App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto  $restaurantPhoto
     * @return void
     */
    public function restored(RestaurantPhoto $restaurantPhoto)
    {
        //
    }

    /**
     * Handle the RestaurantPhoto "force deleted" event.
     *
     * @param  \App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto  $restaurantPhoto
     * @return void
     */
    public function forceDeleted(RestaurantPhoto $restaurantPhoto)
    {
        //
    }
}
