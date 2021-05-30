<?php


namespace App\Http\Requests\General\Regions\RegionTranslations;


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
            'region_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
