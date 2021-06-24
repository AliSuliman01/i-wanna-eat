<?php


namespace App\Http\Requests\Main\Categories\CategoryPhotos;


use App\Http\Requests\CustomFormRequest;

class CategoryPhotoUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_photos,id,deleted_at,NULL',
            'category_id' 					=> '' ,
			'photo_path' 					=> '' ,
			
        ];
    }
}
