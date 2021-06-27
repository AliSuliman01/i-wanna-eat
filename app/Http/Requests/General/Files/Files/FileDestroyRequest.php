<?php


namespace App\Http\Requests\General\Files\Files;


use App\Http\Requests\CustomFormRequest;

class FileDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:files,id,deleted_at,NULL',
        ];
    }
}
