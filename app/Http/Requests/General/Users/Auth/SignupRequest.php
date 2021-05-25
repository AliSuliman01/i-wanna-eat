<?php


namespace App\Http\Requests\General\Users\Auth;


use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' 					=> 'required|unique:users,email,NULL,id,deleted_at,NULL' ,
            'username' 					=> 'required|unique:users,username,NULL,id,deleted_at,NULL' ,
            'mobile_number' 			=> 'required|unique:users,mobile_number,NULL,id,deleted_at,NULL' ,
            'password' 					=> 'required|min:8' ,
            'region_id'                 => 'nullable|exists:regions,id,deleted_at,NULL'
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
