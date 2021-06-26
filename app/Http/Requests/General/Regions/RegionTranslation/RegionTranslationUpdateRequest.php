<?php


namespace App\Http\Requests\General\Regions\RegionTranslation;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTranslationUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_translations,id,deleted_at,NULL',
            'region_id' 					=> 'required|exists:regions,id,deleted_at,NULL' ,
            'language_id' 					=> 'required|exists:languages,id,deleted_at,NULL' ,
            'name' 					=> 'required|string|unique:region_translation,name,'.$this->id.',id,deleted_at,NULL' ,
        ];
    }
}
