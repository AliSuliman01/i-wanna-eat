<?php


namespace App\Http\Requests\General\Regions\RegionTypes;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_types,id,deleted_at,NULL',
        ];
    }
}
