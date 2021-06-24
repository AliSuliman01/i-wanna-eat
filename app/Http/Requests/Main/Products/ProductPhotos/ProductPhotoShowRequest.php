<?php


namespace App\Http\Requests\Main\Products\ProductPhotos;


use App\Http\Requests\CustomFormRequest;

class ProductPhotoShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:product_photos,id,deleted_at,NULL',
        ];
    }
}
