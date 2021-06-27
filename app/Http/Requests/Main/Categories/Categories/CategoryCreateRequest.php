<?php


namespace App\Http\Requests\Main\Categories\Categories;


use App\Http\Requests\CustomFormRequest;

class CategoryCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
			'is_offer' 					=> 'nullable' ,
			'discount_percentage' 					=> 'nullable|decimal' ,
			'expired_at' 					=> 'nullable|string' ,

            'translations' => 'array|required',
            'translations.*.language_id' => 'integer|required|exists:languages,id,deleted_at,NULL',
            'translations.*.name' => 'string|required',
            'translations.*.description' => 'string|required',

            'photos' => 'array|required',
            'photos.*.file_path' => 'string|required'

        ];
    }
}
