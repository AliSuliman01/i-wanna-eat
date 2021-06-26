<?php


namespace App\Http\Requests\General\Regions\RegionTranslation;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTranslationShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:region_translations,id,deleted_at,NULL',
        ];
    }
}
