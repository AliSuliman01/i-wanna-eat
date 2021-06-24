<?php


namespace App\Http\Requests\Main\Restaurants\RestaurantPhotos;


use App\Http\Requests\CustomFormRequest;

class RestaurantPhotoCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
			'restaurant_id' 					=> '' ,
			'photo_path' 					=> '' ,
        ];
    }
}
