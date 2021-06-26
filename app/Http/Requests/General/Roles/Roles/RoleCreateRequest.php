<?php


namespace App\Http\Requests\General\Roles\Roles;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
			'name' 					=> 'required|unique:roles,name,null,id,deleted_at,NULL' ,
			'description' 					=> 'nullable|string' ,
        ];
    }
}
