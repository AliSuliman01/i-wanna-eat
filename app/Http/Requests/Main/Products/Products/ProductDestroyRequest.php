<?php


namespace App\Http\Requests\Main\Products\Products;


use App\Http\Requests\CustomFormRequest;

class ProductDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id,deleted_at,NULL',
        ];
    }
}
