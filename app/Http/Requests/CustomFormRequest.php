<?php

namespace  App\Http\Requests;

use App\Exceptions\CustomException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CustomFormRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        $e = (new ValidationException($validator));

        throw new CustomException($e->errors(),$e->getTrace(),400);
    }
}
