<?php


namespace App\Http\Requests\Main\Categories\CategoryTranslations;


use App\Http\Requests\CustomFormRequest;

class CategoryTranslationCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,
			'description' 					=> '' ,
			
        ];
    }
}
