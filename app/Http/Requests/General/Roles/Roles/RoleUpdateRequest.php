<?php


namespace App\Http\Requests\General\Roles\Roles;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
			'id' 					=> 'required|integer|exists:roles,id,deleted_at,NULL' ,
            'name' 					=> 'nullable|unique:roles,name,null,id,deleted_at,NULL' ,
            'description' 					=> 'nullable|string' ,
        ];
    }
}
