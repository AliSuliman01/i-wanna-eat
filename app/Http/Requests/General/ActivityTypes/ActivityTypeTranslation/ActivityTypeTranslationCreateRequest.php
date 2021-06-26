<?php


namespace App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeTranslationCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'activity_type_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,
			
        ];
    }
}
