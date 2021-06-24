<?php


namespace App\Http\Requests\Main\Orders\Orders;


use App\Http\Requests\CustomFormRequest;

class OrderCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'discount' 					=> '' ,
			'total_price' 					=> '' ,
			
        ];
    }
}
