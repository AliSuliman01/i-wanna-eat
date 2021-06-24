<?php


namespace App\Domain\Main\Products\ProductIngredient\Observer;

use App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient;
use Illuminate\Support\Facades\Auth;


class ProductIngredientObserver
{
	  /**
     * Handle the ProductIngredient "created" event.
     *
     * @param  \App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient  $productIngredient
     * @return void
     */
    public function created(ProductIngredient $productIngredient)
    {
        $productIngredient->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductIngredient "updated" event.
     *
     * @param  \App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient  $productIngredient
     * @return void
     */
    public function updated(ProductIngredient $productIngredient)
    {
        $productIngredient->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductIngredient "deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient  $productIngredient
     * @return void
     */
    public function deleted(ProductIngredient $productIngredient)
    {
        $productIngredient->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductIngredient "restored" event.
     *
     * @param  \App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient  $productIngredient
     * @return void
     */
    public function restored(ProductIngredient $productIngredient)
    {
        //
    }

    /**
     * Handle the ProductIngredient "force deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient  $productIngredient
     * @return void
     */
    public function forceDeleted(ProductIngredient $productIngredient)
    {
        //
    }
}
