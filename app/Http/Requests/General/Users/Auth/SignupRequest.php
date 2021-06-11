<?php


namespace App\Http\Requests\General\Users\Auth;


use App\Http\Requests\CustomFormRequest;

class SignupRequest extends CustomFormRequest
{

    public function rules(): array
    {
        return [
            'email' 					=> 'required|unique:users,email,NULL,id,deleted_at,NULL' ,
            'username' 					=> 'nullable|unique:users,username,NULL,id,deleted_at,NULL' ,
            'mobile_number' 			=> 'nullable|unique:users,mobile_number,NULL,id,deleted_at,NULL' ,
            'password' 					=> 'required|min:8' ,
            'region_id'                 => 'nullable|exists:regions,id,deleted_at,NULL'
        ];
    }


}
