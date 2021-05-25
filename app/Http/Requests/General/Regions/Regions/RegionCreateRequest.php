<?php


namespace App\Http\Requests\General\Regions\Regions;


use Illuminate\Foundation\Http\FormRequest;

class RegionCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'region_type_id' 					=> '' ,
			'parent_region_id' 					=> '' ,
			
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
