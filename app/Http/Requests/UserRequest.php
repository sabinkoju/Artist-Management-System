<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|integer|min:9',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name field is required',
            'last_name.required' => 'Last name field is required',
            'email.required' => 'Email field is required',
            'password.required' => 'Password field is required',
            'password.min' => 'Password Must be at least 6 characters',
            'phone.required' => 'Phone field is required',
            'dob.required' => 'Birth Date field is required',
            'gender.required' => 'Gender field is required',
            'address.required' => 'Address field is required',
        ];
    }
}
