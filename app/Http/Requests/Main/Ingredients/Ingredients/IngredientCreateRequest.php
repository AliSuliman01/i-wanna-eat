<?php


namespace App\Http\Requests\Main\Ingredients\Ingredients;


use App\Http\Requests\CustomFormRequest;

class IngredientCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'photo_path' 					=> '' ,
			
        ];
    }
}
