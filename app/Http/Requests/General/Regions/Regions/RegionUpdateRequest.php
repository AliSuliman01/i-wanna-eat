<?php


namespace App\Http\Requests\General\Regions\Regions;


use App\Http\Requests\CustomFormRequest;

class RegionUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:regions,id,deleted_at,NULL',
            'region_type_id' 					=> 'nullable|exists:region_types,id,deleted_at,NULL' ,
			'parent_region_id' 					=> 'nullable|exists:regions,id,deleted_at,NULL' ,
        ];
    }
}
