<?php


namespace App\Http\Requests\Content\Restaurants\Restaurants;


use App\Http\Requests\CustomFormRequest;

class RestaurantShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:restaurants,id,deleted_at,NULL',
        ];
    }
}
