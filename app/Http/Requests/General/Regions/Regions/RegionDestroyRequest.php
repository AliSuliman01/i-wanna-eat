<?php


namespace App\Http\Requests\General\Regions\Regions;


use App\Http\Requests\CustomFormRequest;

class RegionDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:regions,id,deleted_at,NULL',
        ];
    }
}
