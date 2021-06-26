<?php


namespace App\Http\Requests\General\ActivityTypes\ActivityTypeTranslation;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeTranslationDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:activity_type_translation,id,deleted_at,NULL',
        ];
    }
}
