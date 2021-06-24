<?php


namespace App\Http\Requests\Main\Products\ProductIngredient;


use App\Http\Requests\CustomFormRequest;

class ProductIngredientCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'product_id' 					=> '' ,
			'ingredient_id' 					=> '' ,
			
        ];
    }
}
