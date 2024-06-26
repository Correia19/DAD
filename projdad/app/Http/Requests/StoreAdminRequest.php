<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends UpdateAdminRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        return array_merge($rules, [
            'password' => 'required|confirmed', Password::min(3),
        ]);
    }

    public function messages(): array
    {
        $messages = parent::messages();
        return array_merge($messages, [
            'password.required' => 'A password é obrigatória',
            'password.confirmed' => 'A password tem de ser confirmada',
            'password.min' => 'A password tem de ter no mínimo 3 caracteres',
        ]);
    }
}
