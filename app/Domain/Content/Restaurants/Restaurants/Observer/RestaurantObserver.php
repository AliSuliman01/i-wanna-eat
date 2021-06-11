<?php


namespace App\Domain\Content\Restaurants\Restaurants\Observer;

use App\Domain\Content\Restaurants\Restaurants\Model\Restaurant;
use Illuminate\Support\Facades\Auth;


class RestaurantObserver
{
	  /**
     * Handle the Restaurant "created" event.
     *
     * @param  \App\Domain\Content\Restaurants\Restaurants\Model\Restaurant  $restaurant
     * @return void
     */
    public function created(Restaurant $restaurant)
    {
        $restaurant->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Restaurant "updated" event.
     *
     * @param  \App\Domain\Content\Restaurants\Restaurants\Model\Restaurant  $restaurant
     * @return void
     */
    public function updated(Restaurant $restaurant)
    {
        $restaurant->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Restaurant "deleted" event.
     *
     * @param  \App\Domain\Content\Restaurants\Restaurants\Model\Restaurant  $restaurant
     * @return void
     */
    public function deleted(Restaurant $restaurant)
    {
        $restaurant->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Restaurant "restored" event.
     *
     * @param  \App\Domain\Content\Restaurants\Restaurants\Model\Restaurant  $restaurant
     * @return void
     */
    public function restored(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the Restaurant "force deleted" event.
     *
     * @param  \App\Domain\Content\Restaurants\Restaurants\Model\Restaurant  $restaurant
     * @return void
     */
    public function forceDeleted(Restaurant $restaurant)
    {
        //
    }
}
