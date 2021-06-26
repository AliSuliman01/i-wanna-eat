<?php


namespace App\Http\Requests\General\Roles\Roles;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoleShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:roles,id,deleted_at,NULL',
        ];
    }
}
