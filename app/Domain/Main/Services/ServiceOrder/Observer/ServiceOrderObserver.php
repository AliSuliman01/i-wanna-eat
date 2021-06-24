<?php


namespace App\Domain\Main\Services\ServiceOrder\Observer;

use App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder;
use Illuminate\Support\Facades\Auth;


class ServiceOrderObserver
{
	  /**
     * Handle the ServiceOrder "created" event.
     *
     * @param  \App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder  $serviceOrder
     * @return void
     */
    public function created(ServiceOrder $serviceOrder)
    {
        $serviceOrder->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ServiceOrder "updated" event.
     *
     * @param  \App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder  $serviceOrder
     * @return void
     */
    public function updated(ServiceOrder $serviceOrder)
    {
        $serviceOrder->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ServiceOrder "deleted" event.
     *
     * @param  \App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder  $serviceOrder
     * @return void
     */
    public function deleted(ServiceOrder $serviceOrder)
    {
        $serviceOrder->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ServiceOrder "restored" event.
     *
     * @param  \App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder  $serviceOrder
     * @return void
     */
    public function restored(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Handle the ServiceOrder "force deleted" event.
     *
     * @param  \App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder  $serviceOrder
     * @return void
     */
    public function forceDeleted(ServiceOrder $serviceOrder)
    {
        //
    }
}
