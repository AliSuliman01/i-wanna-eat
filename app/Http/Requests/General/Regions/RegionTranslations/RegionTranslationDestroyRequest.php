<?php


namespace App\Http\Requests\General\Regions\RegionTranslations;


use Illuminate\Foundation\Http\FormRequest;

class RegionTranslationDestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_translations,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
