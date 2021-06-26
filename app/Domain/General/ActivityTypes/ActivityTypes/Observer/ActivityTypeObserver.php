<?php


namespace App\Domain\General\ActivityTypes\ActivityTypes\Observer;

use App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Support\Facades\Auth;


class ActivityTypeObserver
{
	  /**
     * Handle the ActivityType "created" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType  $activityType
     * @return void
     */
    public function creating(ActivityType $activityType)
    {
        $activityType->created_by_user_id = Auth::id();
    }

    /**
     * Handle the ActivityType "updated" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType  $activityType
     * @return void
     */
    public function updating(ActivityType $activityType)
    {
        $activityType->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the ActivityType "deleted" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType  $activityType
     * @return void
     */
    public function deleting(ActivityType $activityType)
    {
        $activityType->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the ActivityType "restored" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType  $activityType
     * @return void
     */
    public function restored(ActivityType $activityType)
    {
        //
    }

    /**
     * Handle the ActivityType "force deleted" event.
     *
     * @param  \App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType  $activityType
     * @return void
     */
    public function forceDeleted(ActivityType $activityType)
    {
        //
    }
}
