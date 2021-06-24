<?php


namespace App\Http\Requests\Main\Ingredients\IngredientTranslation;


use App\Http\Requests\CustomFormRequest;

class IngredientTranslationDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:ingredient_translation,id,deleted_at,NULL',
        ];
    }
}
