<?php


namespace App\Http\Requests\Content\Restaurants\Restaurants;


use App\Http\Requests\CustomFormRequest;

class RestaurantCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
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
