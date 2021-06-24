<?php


namespace App\Domain\Main\Services\ServiceTranslation\Observer;

use App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation;
use Illuminate\Support\Facades\Auth;


class ServiceTranslationObserver
{
	  /**
     * Handle the ServiceTranslation "created" event.
     *
     * @param  \App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation  $serviceTranslation
     * @return void
     */
    public function created(ServiceTranslation $serviceTranslation)
    {
        $serviceTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ServiceTranslation "updated" event.
     *
     * @param  \App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation  $serviceTranslation
     * @return void
     */
    public function updated(ServiceTranslation $serviceTranslation)
    {
        $serviceTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ServiceTranslation "deleted" event.
     *
     * @param  \App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation  $serviceTranslation
     * @return void
     */
    public function deleted(ServiceTranslation $serviceTranslation)
    {
        $serviceTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ServiceTranslation "restored" event.
     *
     * @param  \App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation  $serviceTranslation
     * @return void
     */
    public function restored(ServiceTranslation $serviceTranslation)
    {
        //
    }

    /**
     * Handle the ServiceTranslation "force deleted" event.
     *
     * @param  \App\Domain\Main\Services\ServiceTranslation\Model\ServiceTranslation  $serviceTranslation
     * @return void
     */
    public function forceDeleted(ServiceTranslation $serviceTranslation)
    {
        //
    }
}
