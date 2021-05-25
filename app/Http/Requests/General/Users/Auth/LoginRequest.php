<?php


namespace App\Http\Requests\General\Users\Auth;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required_without_all:username,mobile_number|exists:users,email,deleted_at,NULL',
            'username' => 'required_without_all:email,mobile_number|exists:users,username,deleted_at,NULL',
            'mobile_number' => 'required_without_all:email,username|exists:users,mobile_number,deleted_at,NULL',
            'password' => 'required|string|min:8',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
