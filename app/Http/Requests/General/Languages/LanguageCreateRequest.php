<?php


namespace App\Http\Requests\General\Languages;


use App\Http\Requests\CustomFormRequest;

class LanguageCreateRequest extends CustomFormRequest
{

    public function rules(): array
    {
        return [
            'name' 					=> 'string|required|unique:languages,name,NULL,id,deleted_at,NULL' ,
			'abbrev' 					=> 'string|nullable|unique:languages,abbrev,NULL,id,deleted_at,NULL' ,

        ];
    }

}
