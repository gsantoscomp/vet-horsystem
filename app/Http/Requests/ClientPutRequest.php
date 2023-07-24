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
            'name' => 'string',
            'phone_number' => 'string',
            'email' => 'email|unique:clients,email,' . $this->id,
            'document_type' => 'string|in:cpf,cnpj',
            'document' => 'string|unique:clients,document,'. $this->id,
            'address' => 'string',
        ];
    }
}
