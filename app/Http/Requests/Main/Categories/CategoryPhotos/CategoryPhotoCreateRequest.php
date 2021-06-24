<?php


namespace App\Http\Requests\Main\Categories\CategoryPhotos;


use App\Http\Requests\CustomFormRequest;

class CategoryPhotoCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' 					=> '' ,
			'photo_path' 					=> '' ,
			
        ];
    }
}
