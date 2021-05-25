<?php


namespace App\Http\Requests\General\Languages;


use Illuminate\Foundation\Http\FormRequest;

class LanguageUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:languages,id,deleted_at,NULL',
            'name' 					=> '' ,
			'abbrev' 					=> '' ,
			
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
