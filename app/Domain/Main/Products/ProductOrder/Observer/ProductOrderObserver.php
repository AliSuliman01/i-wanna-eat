<?php


namespace App\Domain\Main\Products\ProductOrder\Observer;

use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use Illuminate\Support\Facades\Auth;


class ProductOrderObserver
{
	  /**
     * Handle the ProductOrder "created" event.
     *
     * @param  \App\Domain\Main\Products\ProductOrder\Model\ProductOrder  $productOrder
     * @return void
     */
    public function created(ProductOrder $productOrder)
    {
        $productOrder->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductOrder "updated" event.
     *
     * @param  \App\Domain\Main\Products\ProductOrder\Model\ProductOrder  $productOrder
     * @return void
     */
    public function updated(ProductOrder $productOrder)
    {
        $productOrder->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductOrder "deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductOrder\Model\ProductOrder  $productOrder
     * @return void
     */
    public function deleted(ProductOrder $productOrder)
    {
        $productOrder->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ProductOrder "restored" event.
     *
     * @param  \App\Domain\Main\Products\ProductOrder\Model\ProductOrder  $productOrder
     * @return void
     */
    public function restored(ProductOrder $productOrder)
    {
        //
    }

    /**
     * Handle the ProductOrder "force deleted" event.
     *
     * @param  \App\Domain\Main\Products\ProductOrder\Model\ProductOrder  $productOrder
     * @return void
     */
    public function forceDeleted(ProductOrder $productOrder)
    {
        //
    }
}
