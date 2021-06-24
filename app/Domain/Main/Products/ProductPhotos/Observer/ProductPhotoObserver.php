<?php


namespace App\Domain\Main\Products\ProductPhotos\Observer;

use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use Illuminate\Support\Facades\Auth;


class ProductPhotoObserver
{
	  /**
     * Handle the ProductPhoto "created" event.
     *
     * @param  \App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto  $productPhoto
     * @return void
     */
    public function created(ProductPhoto $productPhoto)
    {
        $productPhoto->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductPhoto "updated" event.
     *
     * @param  \App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto  $productPhoto
     * @return void
     */
    public function updated(ProductPhoto $productPhoto)
    {
        $productPhoto->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductPhoto "deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto  $productPhoto
     * @return void
     */
    public function deleted(ProductPhoto $productPhoto)
    {
        $productPhoto->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductPhoto "restored" event.
     *
     * @param  \App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto  $productPhoto
     * @return void
     */
    public function restored(ProductPhoto $productPhoto)
    {
        //
    }

    /**
     * Handle the ProductPhoto "force deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto  $productPhoto
     * @return void
     */
    public function forceDeleted(ProductPhoto $productPhoto)
    {
        //
    }
}
