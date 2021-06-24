<?php


namespace App\Http\Requests\Main\Ingredients\IngredientTranslation;


use App\Http\Requests\CustomFormRequest;

class IngredientTranslationCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'language_id' 					=> '' ,
			'ingredient_id' 					=> '' ,
			'name' 					=> '' ,
			
        ];
    }
}
