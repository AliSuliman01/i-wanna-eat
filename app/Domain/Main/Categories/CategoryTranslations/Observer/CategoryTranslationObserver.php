<?php


namespace App\Domain\Main\Categories\CategoryTranslations\Observer;

use App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;


class CategoryTranslationObserver
{
	  /**
     * Handle the CategoryTranslation "created" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation  $categoryTranslation
     * @return void
     */
    public function created(CategoryTranslation $categoryTranslation)
    {
        $categoryTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryTranslation "updated" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation  $categoryTranslation
     * @return void
     */
    public function updated(CategoryTranslation $categoryTranslation)
    {
        $categoryTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryTranslation "deleted" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation  $categoryTranslation
     * @return void
     */
    public function deleted(CategoryTranslation $categoryTranslation)
    {
        $categoryTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the CategoryTranslation "restored" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation  $categoryTranslation
     * @return void
     */
    public function restored(CategoryTranslation $categoryTranslation)
    {
        //
    }

    /**
     * Handle the CategoryTranslation "force deleted" event.
     *
     * @param  \App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation  $categoryTranslation
     * @return void
     */
    public function forceDeleted(CategoryTranslation $categoryTranslation)
    {
        //
    }
}
