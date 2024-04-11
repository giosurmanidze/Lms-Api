<?php

namespace App\Http\Requests;

use App\Rules\GeorgianPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
        return [
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:15|confirmed',
            'phone' => 'nullable',
            'address' => ['nullable',new GeorgianPhoneNumber]
        ];
    }
}
