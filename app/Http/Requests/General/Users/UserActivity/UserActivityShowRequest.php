<?php


namespace App\Http\Requests\General\Users\UserActivity;


use App\Http\Requests\CustomFormRequest;

class UserActivityShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:user_activity,id,deleted_at,NULL',
        ];
    }
}
