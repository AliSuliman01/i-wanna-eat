<?php


namespace App\Http\Requests\Main\Categories\Categories;


use App\Http\Requests\CustomFormRequest;

class CategoryCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'is_verified_from_us' 					=> '' ,
			'is_offer' 					=> '' ,
			'discount_percentage' 					=> '' ,
			'expired_at' 					=> '' ,
			
        ];
    }
}
