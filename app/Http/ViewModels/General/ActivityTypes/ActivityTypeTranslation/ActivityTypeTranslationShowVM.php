<?php


namespace App\Http\ViewModels\General\ActivityTypes\ActivityTypeTranslation;

use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation;
use Illuminate\Contracts\Support\Arrayable;


class ActivityTypeTranslationShowVM implements Arrayable
{

    private $activityTypeTranslationId;

    public function __construct($props)
    {
        $this->activityTypeTranslationId = $props['id'] ;
    }

    private function get_ActivityTypeTranslation(){
        return ActivityTypeTranslation::find($this->activityTypeTranslationId);
    }
    public function toArray(): array
    {
        return  $this->get_ActivityTypeTranslation()->toArray();
    }
}
