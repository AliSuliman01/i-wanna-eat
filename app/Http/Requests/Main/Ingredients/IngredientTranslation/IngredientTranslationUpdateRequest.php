<?php


namespace App\Http\Requests\Main\Ingredients\IngredientTranslation;


use App\Http\Requests\CustomFormRequest;

class IngredientTranslationUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:ingredient_translation,id,deleted_at,NULL',
            'language_id' 					=> '' ,
			'ingredient_id' 					=> '' ,
			'name' 					=> '' ,
			
        ];
    }
}
