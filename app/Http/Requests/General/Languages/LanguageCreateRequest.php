<?php


namespace App\Http\Requests\General\Languages;


use App\Http\Requests\CustomFormRequest;

class LanguageCreateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' 					=> '' ,
			'abbrev' 					=> '' ,

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
