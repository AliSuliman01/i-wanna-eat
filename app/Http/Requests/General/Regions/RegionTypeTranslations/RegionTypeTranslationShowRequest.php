<?php


namespace App\Http\Requests\General\Regions\RegionTypeTranslations;


use Illuminate\Foundation\Http\FormRequest;

class RegionTypeTranslationShowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=> 'required|exists:region_type_translations,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->route()->parameters();
    }
}
