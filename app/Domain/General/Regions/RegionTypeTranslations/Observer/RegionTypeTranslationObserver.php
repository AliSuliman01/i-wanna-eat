<?php


namespace App\Domain\General\Regions\RegionTypeTranslations\Observer;

use App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation;
use Illuminate\Support\Facades\Auth;


class RegionTypeTranslationObserver
{
	  /**
     * Handle the RegionTypeTranslation "created" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation  $regionTypeTranslation
     * @return void
     */
    public function created(RegionTypeTranslation $regionTypeTranslation)
    {
        $regionTypeTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionTypeTranslation "updated" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation  $regionTypeTranslation
     * @return void
     */
    public function updated(RegionTypeTranslation $regionTypeTranslation)
    {
        $regionTypeTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionTypeTranslation "deleted" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation  $regionTypeTranslation
     * @return void
     */
    public function deleted(RegionTypeTranslation $regionTypeTranslation)
    {
        $regionTypeTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the RegionTypeTranslation "restored" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation  $regionTypeTranslation
     * @return void
     */
    public function restored(RegionTypeTranslation $regionTypeTranslation)
    {
        //
    }

    /**
     * Handle the RegionTypeTranslation "force deleted" event.
     *
     * @param  \App\Domain\General\Regions\RegionTypeTranslations\Model\RegionTypeTranslation  $regionTypeTranslation
     * @return void
     */
    public function forceDeleted(RegionTypeTranslation $regionTypeTranslation)
    {
        //
    }
}
