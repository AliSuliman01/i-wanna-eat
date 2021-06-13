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
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function updated(User $user)
    {
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Domain\General\Users\Users\Model\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
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
