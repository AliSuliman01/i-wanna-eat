<?php


namespace App\Domain\Main\Categories\CategoryPhotos\Observer;

use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Support\Facades\Auth;


class CategoryPhotoObserver
{
	  /**
     * Handle the CategoryPhoto "created" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto  $categoryPhoto
     * @return void
     */
    public function created(CategoryPhoto $categoryPhoto)
    {
        $categoryPhoto->created_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryPhoto "updated" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto  $categoryPhoto
     * @return void
     */
    public function updated(CategoryPhoto $categoryPhoto)
    {
        $categoryPhoto->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryPhoto "deleted" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto  $categoryPhoto
     * @return void
     */
    public function deleted(CategoryPhoto $categoryPhoto)
    {
        $categoryPhoto->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryPhoto "restored" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto  $categoryPhoto
     * @return void
     */
    public function restored(CategoryPhoto $categoryPhoto)
    {
        //
    }

    /**
     * Handle the CategoryPhoto "force deleted" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto  $categoryPhoto
     * @return void
     */
    public function forceDeleted(CategoryPhoto $categoryPhoto)
    {
        //
    }
}
