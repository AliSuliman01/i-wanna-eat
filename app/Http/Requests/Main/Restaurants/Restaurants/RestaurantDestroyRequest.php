<?php


namespace App\Http\Requests\Main\Restaurants\Restaurants;


use App\Http\Requests\CustomFormRequest;

class RestaurantDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:restaurants,id,deleted_at,NULL',
        ];
    }
}
