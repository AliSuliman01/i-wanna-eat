<?php


namespace App\Http\Requests\Main\Products\Products;


use App\Http\Requests\CustomFormRequest;

class ProductUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id,deleted_at,NULL',
            'is_verified_from_us' 					=> '' ,
			'category_id' 					=> '' ,
			'price' 					=> '' ,
			'restaurant_id' 					=> '' ,
			
        ];
    }
}
