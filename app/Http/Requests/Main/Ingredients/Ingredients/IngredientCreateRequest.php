<?php


namespace App\Http\Requests\Main\Ingredients\Ingredients;


use App\Http\Requests\CustomFormRequest;

class IngredientCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'photo_path' 					=> 'nullable|string' ,

            'translations' => 'array|required',
            'translations.*.language_id' => 'integer|required|exists:languages,id,deleted_at,NULL',
            'translations.*.name' => 'string|required',
        ];
    }
}
