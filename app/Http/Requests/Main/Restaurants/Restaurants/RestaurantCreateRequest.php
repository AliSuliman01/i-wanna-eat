<?php


namespace App\Http\Requests\Main\Restaurants\Restaurants;


use App\Http\Requests\CustomFormRequest;

class RestaurantCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'latitude'              => 'numeric|required',
            'longitude'             => 'numeric|required',
            'name'                  => 'string|required',
            'open_at'               => 'nullable',
            'close_at'              => 'nullable',
            'has_family_section'    => 'integer|nullable',
            'region_id'             => 'integer|nullable|exists:regions,id,deleted_at,NULL',

            'photos'            => 'nullable|array',
            'photos.*.photo_path'            => 'required|string',
        ];
    }
}
