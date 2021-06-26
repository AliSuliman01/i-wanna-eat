<?php


namespace App\Http\ViewModels\General\ActivityTypes\ActivityTypes;

use App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Contracts\Support\Arrayable;


class ActivityTypeShowVM implements Arrayable
{

    private $activityTypeId;

    public function __construct($props)
    {
        $this->activityTypeId = $props['id'] ;
    }

    private function get_ActivityType(){
        return ActivityType::find($this->activityTypeId);
    }
    public function toArray(): array
    {
        return  $this->get_ActivityType()->toArray();
    }
}
