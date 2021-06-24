<?php


namespace App\Http\Requests\Main\Services\ServiceOrder;


use App\Http\Requests\CustomFormRequest;

class ServiceOrderCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'service_id' 					=> '' ,
			'order_id' 					=> '' ,
			
        ];
    }
}
