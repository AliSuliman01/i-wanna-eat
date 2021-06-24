<?php


namespace App\Domain\Main\Orders\Orders\Observer;

use App\Domain\Main\Orders\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;


class OrderObserver
{
	  /**
     * Handle the Order "created" event.
     *
     * @param  \App\Domain\Main\Orders\Orders\Model\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $order->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Domain\Main\Orders\Orders\Model\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        $order->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Domain\Main\Orders\Orders\Model\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        $order->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Domain\Main\Orders\Orders\Model\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Domain\Main\Orders\Orders\Model\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
