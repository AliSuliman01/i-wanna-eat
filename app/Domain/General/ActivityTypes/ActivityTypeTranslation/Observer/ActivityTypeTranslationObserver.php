<?php


namespace App\Domain\General\ActivityTypes\ActivityTypeTranslation\Observer;

use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation;
use Illuminate\Support\Facades\Auth;


class ActivityTypeTranslationObserver
{
	  /**
     * Handle the ActivityTypeTranslation "created" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation  $activityTypeTranslation
     * @return void
     */
    public function creating(ActivityTypeTranslation $activityTypeTranslation)
    {
        $activityTypeTranslation->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ActivityTypeTranslation "updated" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation  $activityTypeTranslation
     * @return void
     */
    public function updating(ActivityTypeTranslation $activityTypeTranslation)
    {
        $activityTypeTranslation->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ActivityTypeTranslation "deleted" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation  $activityTypeTranslation
     * @return void
     */
    public function deleting(ActivityTypeTranslation $activityTypeTranslation)
    {
        $activityTypeTranslation->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ActivityTypeTranslation "restored" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation  $activityTypeTranslation
     * @return void
     */
    public function restored(ActivityTypeTranslation $activityTypeTranslation)
    {
        //
    }

    /**
     * Handle the ActivityTypeTranslation "force deleted" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation  $activityTypeTranslation
     * @return void
     */
    public function forceDeleted(ActivityTypeTranslation $activityTypeTranslation)
    {
        //
    }
}
