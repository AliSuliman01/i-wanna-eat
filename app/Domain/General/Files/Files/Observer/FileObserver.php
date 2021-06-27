<?php


namespace App\Domain\General\Files\Files\Observer;

use App\Domain\General\Files\Files\Model\File;
use Illuminate\Support\Facades\Auth;


class FileObserver
{
	  /**
     * Handle the File "created" event.
     *
     * @param  \App\Domain\General\Files\Files\Model\File  $file
     * @return void
     */
    public function creating(File $file)
    {
        $file->created_by_user_id = Auth::id();
    }

    /**
     * Handle the File "updated" event.
     *
     * @param  \App\Domain\General\Files\Files\Model\File  $file
     * @return void
     */
    public function updating(File $file)
    {
        $file->updated_by_user_id = Auth::id();
    }

    /**
     * Handle the File "deleted" event.
     *
     * @param  \App\Domain\General\Files\Files\Model\File  $file
     * @return void
     */
    public function deleting(File $file)
    {
        $file->deleted_by_user_id = Auth::id();
    }

    /**
     * Handle the File "restored" event.
     *
     * @param  \App\Domain\General\Files\Files\Model\File  $file
     * @return void
     */
    public function restored(File $file)
    {
        //
    }

    /**
     * Handle the File "force deleted" event.
     *
     * @param  \App\Domain\General\Files\Files\Model\File  $file
     * @return void
     */
    public function forceDeleted(File $file)
    {
        //
    }
}
