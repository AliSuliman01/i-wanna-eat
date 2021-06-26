<?php


namespace App\Http\ViewModels\General\ActivityTypes\ActivityTypes;

use App\Domain\General\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Contracts\Support\Arrayable;

class ActivityTypeIndexVM implements Arrayable
{

    public function get_activity_types(){
    	return ActivityType::all();
	}
    public function toArray(): array
    {
        return $this->get_activity_types()->toArray();
    }
}
