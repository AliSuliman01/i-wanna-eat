<?php


namespace App\Http\Requests\General\Languages;


use Illuminate\Foundation\Http\FormRequest;

class LanguageCreateRequest extends FormRequest
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
