<?php


namespace App\Http\Requests\General\Users\Users;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserShowRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=> 'required|exists:users,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->route()->parameters();
    }
}
