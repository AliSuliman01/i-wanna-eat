<?php


namespace App\Domain\General\Users\UserConnections\Observer;

use App\Domain\General\Users\UserConnections\Model\UserConnection;
use Illuminate\Support\Facades\Auth;


class UserConnectionObserver
{
	  /**
     * Handle the UserConnection "created" event.
     *
     * @param  \App\Domain\General\Users\UserConnections\Model\UserConnection  $userConnection
     * @return void
     */
    public function creating(UserConnection $userConnection)
    {
        $userConnection->created_by_user_id = Auth::id();
    }

    /**
     * Handle the UserConnection "updated" event.
     *
     * @param  \App\Domain\General\Users\UserConnections\Model\UserConnection  $userConnection
     * @return void
     */
    public function updating(UserConnection $userConnection)
    {
        $userConnection->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the UserConnection "deleted" event.
     *
     * @param  \App\Domain\General\Users\UserConnections\Model\UserConnection  $userConnection
     * @return void
     */
    public function deleting(UserConnection $userConnection)
    {
        $userConnection->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the UserConnection "restored" event.
     *
     * @param  \App\Domain\General\Users\UserConnections\Model\UserConnection  $userConnection
     * @return void
     */
    public function restored(UserConnection $userConnection)
    {
        //
    }

    /**
     * Handle the UserConnection "force deleted" event.
     *
     * @param  \App\Domain\General\Users\UserConnections\Model\UserConnection  $userConnection
     * @return void
     */
    public function forceDeleted(UserConnection $userConnection)
    {
        //
    }
}
