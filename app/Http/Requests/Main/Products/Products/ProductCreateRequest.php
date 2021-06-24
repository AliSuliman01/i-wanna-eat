<?php


namespace App\Http\Requests\Main\Products\Products;


use App\Http\Requests\CustomFormRequest;

class ProductCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'is_verified_from_us' 					=> '' ,
			'category_id' 					=> '' ,
			'price' 					=> '' ,
			'restaurant_id' 					=> '' ,
			
        ];
    }
}
