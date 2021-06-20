<?php


namespace App\Http\Requests\Main\Restaurants\Restaurants;


use App\Http\Requests\CustomFormRequest;

class RestaurantUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:restaurants,id,deleted_at,NULL',
            'region_id' => '',
            'name' => '',
            'stars' => '',
            'is_validated_from_us' => '',
            'open_at' => '',
            'close_at' => '',
            'has_family_section' => '',

        ];
    }
}
