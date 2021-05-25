<?php


namespace App\Domain\General\Users\Users\Observer;

use App\Domain\General\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;


class UserObserver
{
	  /**
     * Handle the User "created" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->created_by_user_id = Auth::id();
        $user->save();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $user->updated_by_user_id = Auth::id();
        $user->save();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->deleted_by_user_id = Auth::id();
        $user->save();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
