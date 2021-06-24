<?php


namespace App\Http\Requests\Main\Products\ProductTranslation;


use App\Http\Requests\CustomFormRequest;

class ProductTranslationDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:product_translation,id,deleted_at,NULL',
        ];
    }
}
