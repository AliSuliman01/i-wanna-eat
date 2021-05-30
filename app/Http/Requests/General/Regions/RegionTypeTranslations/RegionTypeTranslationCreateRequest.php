<?php


namespace App\Http\Requests\General\Regions\RegionTypeTranslations;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeTranslationCreateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'region_type_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
