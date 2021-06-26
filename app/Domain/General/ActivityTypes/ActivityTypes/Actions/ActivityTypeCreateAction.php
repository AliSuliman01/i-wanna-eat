<?php


namespace App\Domain\General\ActivityTypes\ActivityTypes\Actions;


use App\Domain\General\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Support\Facades\Auth;

class ActivityTypeCreateAction
{
    public static function execute(
        ActivityTypeDTO $activityTypeDTO
    ){

        $activityType = new ActivityType($activityTypeDTO->toArray());
        $activityType->save();
        return $activityType;
    }
}
