<?php


namespace App\Http\Requests\Main\Products\ProductPhotos;


use App\Http\Requests\CustomFormRequest;

class ProductPhotoCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'product_id' 					=> '' ,
			'photo_path' 					=> '' ,
			
        ];
    }
}
