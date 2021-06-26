<?php


namespace App\Domain\General\Users\UserActivity\Observer;

use App\Domain\General\Users\UserActivity\Model\UserActivity;
use Illuminate\Support\Facades\Auth;


class UserActivityObserver
{
	  /**
     * Handle the UserActivity "created" event.
     *
     * @param  \App\Domain\General\Users\UserActivity\Model\UserActivity  $userActivity
     * @return void
     */
    public function creating(UserActivity $userActivity)
    {
        $userActivity->created_by_user_id = Auth::id();
    }

    /**
     * Handle the UserActivity "updated" event.
     *
     * @param  \App\Domain\General\Users\UserActivity\Model\UserActivity  $userActivity
     * @return void
     */
    public function updating(UserActivity $userActivity)
    {
        $userActivity->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the UserActivity "deleted" event.
     *
     * @param  \App\Domain\General\Users\UserActivity\Model\UserActivity  $userActivity
     * @return void
     */
    public function deleting(UserActivity $userActivity)
    {
        $userActivity->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the UserActivity "restored" event.
     *
     * @param  \App\Domain\General\Users\UserActivity\Model\UserActivity  $userActivity
     * @return void
     */
    public function restored(UserActivity $userActivity)
    {
        //
    }

    /**
     * Handle the UserActivity "force deleted" event.
     *
     * @param  \App\Domain\General\Users\UserActivity\Model\UserActivity  $userActivity
     * @return void
     */
    public function forceDeleted(UserActivity $userActivity)
    {
        //
    }
}
