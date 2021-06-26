<?php


namespace App\Http\Requests\General\Regions\RegionTranslation;


use App\Http\Requests\CustomFormRequest;

class RegionTranslationCreateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'region_id' 					=> 'required|exists:regions,id,deleted_at,NULL' ,
			'language_id' 					=> 'required|exists:languages,id,deleted_at,NULL' ,
			'name' 					=> 'required|string|unique:region_translation,name,null,id,deleted_at,NULL' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
