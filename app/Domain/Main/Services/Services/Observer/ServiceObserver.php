<?php


namespace App\Domain\Main\Services\Services\Observer;

use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Support\Facades\Auth;


class ServiceObserver
{
	  /**
     * Handle the Service "created" event.
     *
     * @param  \App\Domain\Main\Services\Services\Model\Service  $service
     * @return void
     */
    public function created(Service $service)
    {
        $service->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Service "updated" event.
     *
     * @param  \App\Domain\Main\Services\Services\Model\Service  $service
     * @return void
     */
    public function updated(Service $service)
    {
        $service->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Service "deleted" event.
     *
     * @param  \App\Domain\Main\Services\Services\Model\Service  $service
     * @return void
     */
    public function deleted(Service $service)
    {
        $service->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Service "restored" event.
     *
     * @param  \App\Domain\Main\Services\Services\Model\Service  $service
     * @return void
     */
    public function restored(Service $service)
    {
        //
    }

    /**
     * Handle the Service "force deleted" event.
     *
     * @param  \App\Domain\Main\Services\Services\Model\Service  $service
     * @return void
     */
    public function forceDeleted(Service $service)
    {
        //
    }
}
