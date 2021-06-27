<?php


namespace App\Http\Requests\Main\Restaurants\Restaurants;


use App\Http\Requests\CustomFormRequest;

class RestaurantUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:restaurants,id,deleted_at,NULL',
            'latitude'              => 'numeric|nullable',
            'longitude'             => 'numeric|nullable',
            'name'                  => 'string|nullable',
            'open_at'               => 'nullable',
            'close_at'              => 'nullable',
            'has_family_section'    => 'integer|nullable',
            'region_id'             => 'integer|nullable|exists:regions,id,deleted_at,NULL',

            'photos'            => 'nullable|array',
            'photos.*.id'            => 'required|integer|restaurant_photos,id,deleted_at,NULL',
            'photos.*.file_path'            => 'required|string',

        ];
    }
}
