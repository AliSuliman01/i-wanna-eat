<?php


namespace App\Domain\General\Regions\Regions\Observer;

use App\Domain\General\Regions\Regions\Model\Region;
use Illuminate\Support\Facades\Auth;


class RegionObserver
{
	  /**
     * Handle the Region "created" event.
     *
     * @param  \App\Domain\General\Regions\Regions\Model\Region  $region
     * @return void
     */
    public function created(Region $region)
    {
        $region->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Region "updated" event.
     *
     * @param  \App\Domain\General\Regions\Regions\Model\Region  $region
     * @return void
     */
    public function updated(Region $region)
    {
        $region->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Region "deleted" event.
     *
     * @param  \App\Domain\General\Regions\Regions\Model\Region  $region
     * @return void
     */
    public function deleted(Region $region)
    {
        $region->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Region "restored" event.
     *
     * @param  \App\Domain\General\Regions\Regions\Model\Region  $region
     * @return void
     */
    public function restored(Region $region)
    {
        //
    }

    /**
     * Handle the Region "force deleted" event.
     *
     * @param  \App\Domain\General\Regions\Regions\Model\Region  $region
     * @return void
     */
    public function forceDeleted(Region $region)
    {
        //
    }
}
