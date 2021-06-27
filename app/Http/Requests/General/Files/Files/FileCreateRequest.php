<?php


namespace App\Http\Requests\General\Files\Files;


use App\Http\Requests\CustomFormRequest;

class FileCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'file_name' 			=> 'required|string' ,
			'file' 					=> 'file' ,
			'file_path' 			=> 'required|string' ,

        ];
    }

    public function validationData(): array
    {
        return $this->all();
    }
}
