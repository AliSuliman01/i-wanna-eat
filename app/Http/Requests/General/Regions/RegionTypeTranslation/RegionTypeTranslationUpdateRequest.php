<?php


namespace App\Http\Requests\General\Regions\RegionTypeTranslation;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeTranslationUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_type_translations,id,deleted_at,NULL',
            'region_type_id' 					=> 'required|exists:region_types,id,deleted_at,NULL' ,
            'language_id' 					=> 'required|exists:languages,id,deleted_at,NULL' ,
            'name' 					=> 'required|string|unique:region_translation,name,'.$this->id.',id,deleted_at,NULL' ,
        ];
    }
}
