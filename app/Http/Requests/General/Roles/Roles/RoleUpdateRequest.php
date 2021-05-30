<?php


namespace App\Http\Requests\General\Roles\Roles;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:roles,id,deleted_at,NULL',
            'id' 					=> '' ,
			'user_name' 					=> '' ,
			'email' 					=> '' ,
			'password' 					=> '' ,
			'role_id' 					=> '' ,
			'default_translation_id' 					=> '' ,
			'user_photo' 					=> '' ,
			'mobile_number' 					=> '' ,
			'region_id' 					=> '' ,
			'activation_token' 					=> '' ,
			'reset_password_token' 					=> '' ,
			'is_activated' 					=> '' ,
			'is_password_reset' 					=> '' ,
			'id' 					=> '' ,
			'name' 					=> '' ,
			'description' 					=> '' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
