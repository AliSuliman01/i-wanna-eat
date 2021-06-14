<?php

namespace App\Http\Requests;

use App\Exceptions\CustomException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class CustomFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $e = (new ValidationException($validator));
        $errors = $e->errors() ;
        reset($errors);
        throw new CustomException($errors[key($errors)][0], $e->getTrace(), 400);
    }

    public abstract function rules();

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
