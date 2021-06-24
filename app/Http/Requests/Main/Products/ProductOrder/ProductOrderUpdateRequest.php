<?php


namespace App\Http\Requests\Main\Products\ProductOrder;


use App\Http\Requests\CustomFormRequest;

class ProductOrderUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:product_order,id,deleted_at,NULL',
            'product_id' 					=> '' ,
			'order_id' 					=> '' ,
			
        ];
    }
}
