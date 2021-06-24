<?php


namespace App\Http\Requests\Main\Services\ServiceOrder;


use App\Http\Requests\CustomFormRequest;

class ServiceOrderDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:service_order,id,deleted_at,NULL',
        ];
    }
}
