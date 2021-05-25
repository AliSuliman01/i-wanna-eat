<?php


namespace App\Domain\General\Roles\Roles\Observer;

use App\Domain\General\Roles\Roles\Model\Role;
use Illuminate\Support\Facades\Auth;


class RoleObserver
{
	  /**
     * Handle the Role "created" event.
     *
     * @param  \App\Domain\General\Roles\Roles\Model\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        $role->created_by_user_id = Auth::id();
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  \App\Domain\General\Roles\Roles\Model\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        $role->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \App\Domain\General\Roles\Roles\Model\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        $role->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param  \App\Domain\General\Roles\Roles\Model\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param  \App\Domain\General\Roles\Roles\Model\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
