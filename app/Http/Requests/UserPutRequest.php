<?php

namespace App\Http\Requests;

class UserPutRequest extends BaseRequest
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
            'id' => 'required|exists:users,id',
            'email' => 'required|email|unique:users,email,'. $this->id,
            'password' => 'required|string|min:6',
            'name' => 'required|string',
            'user_type_id' => 'required|exists:users_types,id'
        ];
    }
}
