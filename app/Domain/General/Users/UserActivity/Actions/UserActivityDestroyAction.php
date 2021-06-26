<?php


namespace App\Domain\General\Users\UserActivity\Actions;


use App\Domain\General\Users\UserActivity\DTO\UserActivityDTO;
use App\Domain\General\Users\UserActivity\Model\UserActivity;
use Illuminate\Support\Facades\Auth;

class UserActivityDestroyAction
{
    public static function execute(
        UserActivityDTO   $userActivityDTO
    ){

        $userActivity = UserActivity::find($userActivityDTO->id);
        $userActivity->delete();
        return $userActivity;
    }
}
