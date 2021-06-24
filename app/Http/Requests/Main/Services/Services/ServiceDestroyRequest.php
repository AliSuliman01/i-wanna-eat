<?php


namespace App\Http\Requests\Main\Services\Services;


use App\Http\Requests\CustomFormRequest;

class ServiceDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:services,id,deleted_at,NULL',
        ];
    }
}
