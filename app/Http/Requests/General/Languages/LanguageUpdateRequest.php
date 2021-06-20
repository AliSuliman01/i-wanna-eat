<?php


namespace App\Http\Requests\General\Languages;


use App\Http\Requests\CustomFormRequest;

class LanguageUpdateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:languages,id,deleted_at,NULL',
            'name' 					=> 'string|required|unique:languages,name,'.$this->id.',id,deleted_at,NULL' ,
            'abbrev' 					=> 'string|nullable|unique:languages,abbrev,'.$this->id.',id,deleted_at,NULL' ,


        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
