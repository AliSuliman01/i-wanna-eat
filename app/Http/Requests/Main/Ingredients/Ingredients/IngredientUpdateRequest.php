<?php


namespace App\Http\Requests\Main\Ingredients\Ingredients;


use App\Http\Requests\CustomFormRequest;

class IngredientUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:ingredients,id,deleted_at,NULL',
            'photo_path' 					=> 'nullable|string' ,

            'translations' => 'array|nullable',
            'translations.*.id' => 'integer|nullable|exists:language_translation,id,deleted_at,NULL',
            'translations.*.language_id' => 'integer|required|exists:languages,id,deleted_at,NULL',
            'translations.*.name' => 'string|required',
        ];
    }
}
