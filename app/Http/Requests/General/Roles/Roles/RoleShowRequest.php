<?php


namespace App\Http\Requests\General\Roles\Roles;


use Illuminate\Foundation\Http\FormRequest;

class RoleShowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=> 'required|exists:roles,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->route()->parameters();
    }
}
