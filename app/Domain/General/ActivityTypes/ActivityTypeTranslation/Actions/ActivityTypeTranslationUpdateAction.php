<?php


namespace App\Domain\General\ActivityTypes\ActivityTypeTranslation\Actions;


use App\Domain\General\ActivityTypes\ActivityTypeTranslation\DTO\ActivityTypeTranslationDTO;
use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation;
use Illuminate\Support\Facades\Auth;

class ActivityTypeTranslationUpdateAction
{

    public static function execute(
        ActivityTypeTranslationDTO $activityTypeTranslationDTO
    ){
        $activityTypeTranslation = ActivityTypeTranslation::find($activityTypeTranslationDTO->id);
        $activityTypeTranslation->update(array_filter($activityTypeTranslationDTO->toArray()));
        $activityTypeTranslation->save();
        return $activityTypeTranslation;
    }
}
