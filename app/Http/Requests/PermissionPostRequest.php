<?php

namespace App\Http\Requests;

class PermissionPostRequest extends BaseRequest
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
            'module' => 'required|string',
            'page' => 'required|string',
            'name' => 'required|string',
            'user_type_id' => 'required|exists:users_types,id'
        ];
    }
}
