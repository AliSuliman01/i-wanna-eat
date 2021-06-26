<?php


namespace App\Http\ViewModels\General\Users\UserActivity;

use App\Domain\General\Users\UserActivity\Model\UserActivity;
use Illuminate\Contracts\Support\Arrayable;


class UserActivityShowVM implements Arrayable
{

    private $userActivityId;

    public function __construct($props)
    {
        $this->userActivityId = $props['id'] ;
    }

    private function get_UserActivity(){
        return UserActivity::find($this->userActivityId);
    }
    public function toArray(): array
    {
        return  $this->get_UserActivity()->toArray();
    }
}
