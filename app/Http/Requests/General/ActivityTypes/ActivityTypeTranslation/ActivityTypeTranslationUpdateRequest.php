<?php


namespace App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeTranslationUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:activity_type_translation,id,deleted_at,NULL',
            'activity_type_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,
			
        ];
    }
}
