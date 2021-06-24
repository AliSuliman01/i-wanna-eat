<?php


namespace App\Http\Requests\Main\Services\ServiceTranslation;


use App\Http\Requests\CustomFormRequest;

class ServiceTranslationCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'service_id' 					=> '' ,
			'language_id' 					=> '' ,
			'name' 					=> '' ,
			'description' 					=> '' ,
			
        ];
    }
}
