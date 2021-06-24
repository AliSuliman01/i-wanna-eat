<?php


namespace App\Http\Requests\Main\Orders\Orders;


use App\Http\Requests\CustomFormRequest;

class OrderShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:orders,id,deleted_at,NULL',
        ];
    }
}
