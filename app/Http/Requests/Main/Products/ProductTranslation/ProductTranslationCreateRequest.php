<?php


namespace App\Http\Requests\Main\Products\ProductTranslation;


use App\Http\Requests\CustomFormRequest;

class ProductTranslationCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'product_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,
			'description' 					=> '' ,
			
        ];
    }
}
