<?php


namespace App\Http\Requests\Main\Categories\CategoryTranslations;


use App\Http\Requests\CustomFormRequest;

class CategoryTranslationUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_translations,id,deleted_at,NULL',
            'category_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,
			'description' 					=> '' ,
			
        ];
    }
}
