<?php


namespace App\Domain\Main\Products\Products\Observer;

use App\Domain\Main\Products\Products\Model\Product;
use Illuminate\Support\Facades\Auth;


class ProductObserver
{
	  /**
     * Handle the Product "created" event.
     *
     * @param  \App\Domain\Main\Products\Products\Model\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $product->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Domain\Main\Products\Products\Model\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $product->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Domain\Main\Products\Products\Model\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $product->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Domain\Main\Products\Products\Model\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Domain\Main\Products\Products\Model\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
