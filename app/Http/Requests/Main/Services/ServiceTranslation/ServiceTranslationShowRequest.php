<?php


namespace App\Http\Requests\Main\Services\ServiceTranslation;


use App\Http\Requests\CustomFormRequest;

class ServiceTranslationShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:service_translation,id,deleted_at,NULL',
        ];
    }
}
