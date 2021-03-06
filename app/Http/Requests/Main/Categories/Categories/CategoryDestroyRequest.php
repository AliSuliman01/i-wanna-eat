<?php


namespace App\Http\Requests\Main\Categories\Categories;


use App\Http\Requests\CustomFormRequest;

class CategoryDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id,deleted_at,NULL',
        ];
    }
}
