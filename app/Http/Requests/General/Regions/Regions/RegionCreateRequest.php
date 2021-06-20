<?php


namespace App\Http\Requests\General\Regions\Regions;


use App\Http\Requests\CustomFormRequest;

class RegionCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'region_type_id' 					=> 'integer|required|exists:region_types,id,deleted_at,NULL' ,
			'parent_region_id' 					=> 'integer|nullable|exists:regions,id,deleted_at,NULL' ,
            'translations' => 'array|required',
            'translations.*.language_id'    => 'integer|required|exists:languages,id,deleted_at,NULL',
            'translations.*.name'    => 'required|unique:region_translations,name,NULL,id,deleted_at,NULL',

        ];
    }
}
