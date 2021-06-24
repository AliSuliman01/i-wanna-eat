<?php


namespace App\Http\Requests\Main\Products\ProductOrder;


use App\Http\Requests\CustomFormRequest;

class ProductOrderDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:product_order,id,deleted_at,NULL',
        ];
    }
}
