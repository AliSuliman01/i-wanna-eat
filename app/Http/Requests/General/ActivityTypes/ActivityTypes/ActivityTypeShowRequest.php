<?php


namespace App\Http\Requests\General\ActivityTypes\ActivityTypes;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:activity_types,id,deleted_at,NULL',
        ];
    }
}
