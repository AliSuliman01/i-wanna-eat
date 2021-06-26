<?php


namespace App\Http\Requests\General\Regions\RegionTypeTranslation;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeTranslationShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:region_type_translations,id,deleted_at,NULL',
        ];
    }
}
