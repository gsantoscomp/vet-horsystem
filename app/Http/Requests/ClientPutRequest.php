<?php

namespace App\Http\Requests;


class ClientPutRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:clients,id',
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'cpf' => 'required|string|unique:clients,cpf',
            'address' => 'required|string',
        ];
    }
}
