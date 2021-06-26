<?php


namespace App\Http\Requests\General\Regions\RegionTypes;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'translations' => 'array|required',
            'translations.*.language_id' => 'required|exists:languages,id,deleted_at,NULL',
            'translations.*.name' => 'required|unique:region_type_translations,name,NULL,id,deleted_at,NULL'
        ];
    }
}
