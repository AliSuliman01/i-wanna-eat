<?php


namespace App\Domain\General\ActivityTypes\ActivityTypes\Actions;


use App\Domain\General\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Support\Facades\Auth;

class ActivityTypeUpdateAction
{

    public static function execute(
        ActivityTypeDTO $activityTypeDTO
    ){
        $activityType = ActivityType::find($activityTypeDTO->id);
        $activityType->update(array_filter($activityTypeDTO->toArray()));
        $activityType->save();
        return $activityType;
    }
}
