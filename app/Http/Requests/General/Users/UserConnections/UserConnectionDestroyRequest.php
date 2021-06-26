<?php


namespace App\Http\Requests\General\Users\UserConnections;


use App\Http\Requests\CustomFormRequest;

class UserConnectionDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:user_connections,id,deleted_at,NULL',
        ];
    }
}
