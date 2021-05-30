<?php


namespace App\Http\Requests\General\Regions\Regions;


use App\Http\Requests\CustomFormRequest;

class RegionUpdateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:regions,id,deleted_at,NULL',
            'region_type_id' 					=> '' ,
			'parent_region_id' 					=> '' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
