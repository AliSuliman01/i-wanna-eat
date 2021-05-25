<?php


namespace App\Http\Requests\General\Regions\RegionTranslations;


use Illuminate\Foundation\Http\FormRequest;

class RegionTranslationCreateRequest extends FormRequest
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
