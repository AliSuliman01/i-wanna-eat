<?php


namespace App\Domain\General\Regions\RegionTypes\Observer;

use App\Domain\General\Regions\RegionTypes\Model\RegionType;
use Illuminate\Support\Facades\Auth;


class RegionTypeObserver
{
	  /**
     * Handle the RegionType "created" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypes\Model\RegionType  $regionType
     * @return void
     */
    public function created(RegionType $regionType)
    {
        $regionType->created_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionType "updated" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypes\Model\RegionType  $regionType
     * @return void
     */
    public function updated(RegionType $regionType)
    {
        $regionType->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionType "deleted" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypes\Model\RegionType  $regionType
     * @return void
     */
    public function deleted(RegionType $regionType)
    {
        $regionType->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionType "restored" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypes\Model\RegionType  $regionType
     * @return void
     */
    public function restored(RegionType $regionType)
    {
        //
    }

    /**
     * Handle the RegionType "force deleted" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypes\Model\RegionType  $regionType
     * @return void
     */
    public function forceDeleted(RegionType $regionType)
    {
        //
    }
}
