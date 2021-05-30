<?php


namespace App\Http\Requests\General\Regions\RegionTranslations;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTranslationUpdateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_translations,id,deleted_at,NULL',
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
