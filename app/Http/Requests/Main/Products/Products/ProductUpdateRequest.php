<?php


namespace App\Http\Requests\Main\Products\Products;


use App\Http\Requests\CustomFormRequest;

class ProductUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id,deleted_at,NULL',
            'category_id' 					=> 'nullable|integer|exists:categories,id,deleted_at,NULL' ,
            'price' 					=> 'nullable|decimal' ,
            'restaurant_id' 					=> 'nullable|integer|exists:restaurants,id,deleted_at,NULL' ,

            'translations'             => 'nullable|array',
            'translations.*.id'    => 'nullable|integer|exists:product_translation,id,deleted_at,NULL',
            'translations.*.language_id'    => 'required|integer|exists:languages,id,deleted_at,NULL',
            'translations.*.name'    => 'required|string',
            'translations.*.description'    => 'nullable|string',

            'ingredients'       => 'nullable|array',
            'ingredients.*'    => 'required|integer|exists:ingredients,id,deleted_at,NULL',

            'photos'            => 'nullable|array',
            'photos.*.id'            => 'nullable|integer|exists:product_photos,id,deleted_at,NULL',
            'photos.*.photo_path'            => 'required|string',

        ];
    }
}
