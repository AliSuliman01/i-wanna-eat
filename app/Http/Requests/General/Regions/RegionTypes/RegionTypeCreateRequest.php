<?php


namespace App\Http\Requests\General\Regions\RegionTypes;


use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionTypeCreateRequest extends CustomFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
