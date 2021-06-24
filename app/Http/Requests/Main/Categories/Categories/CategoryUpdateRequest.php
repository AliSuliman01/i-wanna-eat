<?php


namespace App\Http\Requests\Main\Categories\Categories;


use App\Http\Requests\CustomFormRequest;

class CategoryUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id,deleted_at,NULL',
            'is_verified_from_us' 					=> '' ,
			'is_offer' 					=> '' ,
			'discount_percentage' 					=> '' ,
			'expired_at' 					=> '' ,
			
        ];
    }
}
