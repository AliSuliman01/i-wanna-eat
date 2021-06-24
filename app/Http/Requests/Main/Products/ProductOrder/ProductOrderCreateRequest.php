<?php


namespace App\Http\Requests\Main\Products\ProductOrder;


use App\Http\Requests\CustomFormRequest;

class ProductOrderCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'product_id' 					=> '' ,
			'order_id' 					=> '' ,
			
        ];
    }
}
