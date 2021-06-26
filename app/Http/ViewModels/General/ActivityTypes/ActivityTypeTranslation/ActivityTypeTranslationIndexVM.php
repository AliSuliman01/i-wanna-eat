<?php


namespace App\Http\ViewModels\General\ActivityTypes\ActivityTypeTranslation;

use App\Domain\General\ActivityTypes\ActivityTypeTranslation\Model\ActivityTypeTranslation;
use Illuminate\Contracts\Support\Arrayable;

class ActivityTypeTranslationIndexVM implements Arrayable
{

    public function get_activity_type_translation(){
    	return ActivityTypeTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_activity_type_translation()->toArray();
    }
}
