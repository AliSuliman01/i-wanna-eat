<?php


namespace App\Domain\General\Regions\RegionTranslation\Observer;

use App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation;
use Illuminate\Support\Facades\Auth;


class RegionTranslationObserver
{
	  /**
     * Handle the RegionTranslation "created" event.
     *
     * @param  \App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation  $regionTranslation
     * @return void
     */
    public function created(RegionTranslation $regionTranslation)
    {
        $regionTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionTranslation "updated" event.
     *
     * @param  \App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation  $regionTranslation
     * @return void
     */
    public function updated(RegionTranslation $regionTranslation)
    {
        $regionTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionTranslation "deleted" event.
     *
     * @param  \App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation  $regionTranslation
     * @return void
     */
    public function deleted(RegionTranslation $regionTranslation)
    {
        $regionTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionTranslation "restored" event.
     *
     * @param  \App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation  $regionTranslation
     * @return void
     */
    public function restored(RegionTranslation $regionTranslation)
    {
        //
    }

    /**
     * Handle the RegionTranslation "force deleted" event.
     *
     * @param  \App\Domain\General\Regions\RegionTranslation\Model\RegionTranslation  $regionTranslation
     * @return void
     */
    public function forceDeleted(RegionTranslation $regionTranslation)
    {
        //
    }
}
