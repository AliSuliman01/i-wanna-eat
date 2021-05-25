<?php


namespace App\Http\Requests\General\Users\Users;


use Illuminate\Foundation\Http\FormRequest;

class UserDestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id,deleted_at,NULL',
        ];
    }

    public function validationData(): array
    {
        return $this->json()->all();
    }
}
