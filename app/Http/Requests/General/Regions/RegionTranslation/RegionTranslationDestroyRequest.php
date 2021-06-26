<?php


namespace App\Http\Requests\General\Regions\RegionTranslation;



use App\Http\Requests\CustomFormRequest;

class RegionTranslationDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_translations,id,deleted_at,NULL',
        ];
    }
}
