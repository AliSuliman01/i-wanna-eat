<?php


namespace App\Http\Requests\General\Regions\RegionTypeTranslation;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeTranslationCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'region_type_id' 					=> 'required|exists:region_types,id,deleted_at,NULL' ,
            'language_id' 					=> 'required|exists:languages,id,deleted_at,NULL' ,
            'name' 					=> 'required|string|unique:region_translation,name,null,id,deleted_at,NULL' ,
        ];
    }
}
