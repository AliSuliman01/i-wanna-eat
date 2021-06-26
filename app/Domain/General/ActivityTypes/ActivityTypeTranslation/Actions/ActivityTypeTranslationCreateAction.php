<?php


namespace App\Domain\General\ActivityTypes\ActivityTypeTranslation\Actions;


use App\Domain\General\ActivityTypes\ActivityTypeTranslation\DTO\ActivityTypeTranslationDTO;
use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation;
use Illuminate\Support\Facades\Auth;

class ActivityTypeTranslationCreateAction
{
    public static function execute(
        ActivityTypeTranslationDTO $activityTypeTranslationDTO
    ){

        $activityTypeTranslation = new ActivityTypeTranslation($activityTypeTranslationDTO->toArray());
        $activityTypeTranslation->save();
        return $activityTypeTranslation;
    }
}
