<?php


namespace App\Domain\Main\Products\ProductTranslation\Observer;

use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Support\Facades\Auth;


class ProductTranslationObserver
{
	  /**
     * Handle the ProductTranslation "created" event.
     *
     * @param  \App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation  $productTranslation
     * @return void
     */
    public function created(ProductTranslation $productTranslation)
    {
        $productTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductTranslation "updated" event.
     *
     * @param  \App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation  $productTranslation
     * @return void
     */
    public function updated(ProductTranslation $productTranslation)
    {
        $productTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductTranslation "deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation  $productTranslation
     * @return void
     */
    public function deleted(ProductTranslation $productTranslation)
    {
        $productTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductTranslation "restored" event.
     *
     * @param  \App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation  $productTranslation
     * @return void
     */
    public function restored(ProductTranslation $productTranslation)
    {
        //
    }

    /**
     * Handle the ProductTranslation "force deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation  $productTranslation
     * @return void
     */
    public function forceDeleted(ProductTranslation $productTranslation)
    {
        //
    }
}
