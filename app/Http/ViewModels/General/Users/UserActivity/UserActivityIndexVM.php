<?php


namespace App\Http\ViewModels\General\Users\UserActivity;

use App\Domain\General\Users\UserActivity\Model\UserActivity;
use Illuminate\Contracts\Support\Arrayable;

class UserActivityIndexVM implements Arrayable
{

    public function get_user_activity(){
    	return UserActivity::all();
	}
    public function toArray(): array
    {
        return $this->get_user_activity()->toArray();
    }
}
