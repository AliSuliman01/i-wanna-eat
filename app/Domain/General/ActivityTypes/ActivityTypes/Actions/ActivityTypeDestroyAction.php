<?php


namespace App\Domain\General\ActivityTypes\ActivityTypes\Actions;


use App\Domain\General\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Support\Facades\Auth;

class ActivityTypeDestroyAction
{
    public static function execute(
        ActivityTypeDTO   $activityTypeDTO
    ){

        $activityType = ActivityType::find($activityTypeDTO->id);
        $activityType->delete();
        return $activityType;
    }
}
