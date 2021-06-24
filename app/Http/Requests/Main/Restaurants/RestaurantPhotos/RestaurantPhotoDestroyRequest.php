<?php


namespace App\Http\Requests\Main\Restaurants\RestaurantPhotos;


use App\Http\Requests\CustomFormRequest;

class RestaurantPhotoDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:restaurant_photos,id,deleted_at,NULL',
        ];
    }
}
