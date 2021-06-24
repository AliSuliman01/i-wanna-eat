<?php


namespace App\Http\Requests\Main\Categories\CategoryPhotos;


use App\Http\Requests\CustomFormRequest;

class CategoryPhotoDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_photos,id,deleted_at,NULL',
        ];
    }
}
