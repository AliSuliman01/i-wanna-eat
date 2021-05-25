<?php


namespace App\Http\Requests\General\Regions\Regions;


use Illuminate\Foundation\Http\FormRequest;

class RegionShowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=> 'required|exists:regions,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->route()->parameters();
    }
}
