<?php


namespace App\Http\Requests\Main\Products\Products;


use App\Http\Requests\CustomFormRequest;

class ProductCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
			'category_id' 					=> 'required|integer|exists:categories,id,deleted_at,NULL' ,
			'price' 					=> 'required|decimal' ,
			'restaurant_id' 					=> 'required|integer|exists:restaurants,id,deleted_at,NULL' ,

            'translations'             => 'required|array',
            'translations.*.language_id'    => 'required|integer|exists:languages,id,deleted_at,NULL',
            'translations.*.name'    => 'required|string',
            'translations.*.description'    => 'nullable|string',

            'ingredients'       => 'required|array',
            'ingredients.*'    => 'required|integer|exists:ingredients,id,deleted_at,NULL',

            'photos'            => 'required|array',
            'photos.*.photo_path'            => 'required|string',

        ];
    }
}
