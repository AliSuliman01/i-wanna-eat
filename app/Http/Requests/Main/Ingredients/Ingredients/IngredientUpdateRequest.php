<?php


namespace App\Http\Requests\Main\Ingredients\Ingredients;


use App\Http\Requests\CustomFormRequest;

class IngredientUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:ingredients,id,deleted_at,NULL',
            'photo_path' 					=> '' ,
			
        ];
    }
}
