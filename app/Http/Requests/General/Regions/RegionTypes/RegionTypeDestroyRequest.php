<?php


namespace App\Http\Requests\General\Regions\RegionTypes;


use Illuminate\Foundation\Http\FormRequest;

class RegionTypeDestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:region_types,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
