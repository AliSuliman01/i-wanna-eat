<?php


namespace App\Http\Requests\Main\Categories\Categories;


use App\Http\Requests\CustomFormRequest;

class CategoryUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id,deleted_at,NULL',
            'is_offer' 					=> 'nullable' ,
            'discount_percentage' 					=> 'nullable|decimal' ,
            'expired_at' 					=> 'nullable|string' ,

            'translations' => 'array|nullable',
            'translations.*.category_id' => 'integer|required|exists:categories,id,deleted_at,NULL',
            'translations.*.language_id' => 'integer|required|exists:languages,id,deleted_at,NULL',
            'translations.*.name' => 'string|required',
            'translations.*.description' => 'string|required',

            'photos' => 'array|nullable',
            'photos.*.id' => 'integer|nullable|exists:category_photos,id,deleted_at,NULL',
            'photos.*.category_id' => 'integer|required|exists:categories,id,deleted_at,NULL',
            'photos.*.photo_path' => 'string|required',

        ];
    }
}
