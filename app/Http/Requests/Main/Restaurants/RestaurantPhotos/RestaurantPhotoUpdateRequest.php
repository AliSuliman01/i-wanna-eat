<?php


namespace App\Http\Requests\Main\Restaurants\RestaurantPhotos;


use App\Http\Requests\CustomFormRequest;

class RestaurantPhotoUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
			'id' 					=> '' ,
			'restaurant_id' 					=> '' ,
			'photo_path' 					=> '' ,

        ];
    }
}
