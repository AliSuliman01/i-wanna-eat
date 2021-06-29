<?php

namespace App\Http\Requests\Android;

use App\Http\Requests\CustomFormRequest;

class AndroidSearchRequest extends CustomFormRequest
{
    public function rules()
    {
        return [
            'sub_string' => 'required'
        ];
    }
}
