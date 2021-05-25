<?php


namespace App\Http\Requests\General\Users\Users;


use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' 					=> '' ,
			'username' 					=> '' ,
			'email' 					=> '' ,
			'password' 					=> '' ,
			'language_id' 					=> '' ,
			'user_photo' 					=> '' ,
			'mobile_number' 					=> '' ,
			'region_id' 					=> '' ,
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
