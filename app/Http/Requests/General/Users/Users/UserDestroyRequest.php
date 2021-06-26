<?php


namespace App\Http\Requests\General\Users\Users;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id,deleted_at,NULL',
        ];
    }
}
