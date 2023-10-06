<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'first_release_year' => 'required',
            'no_of_albums_released' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'dob.required' => 'Birth Date field is required',
            'gender.required' => 'Gender field is required',
            'address.required' => 'Address field is required',
            'first_release_year.required' => 'First Release Year field is required',
            'no_of_albums_released.required' => 'No. of Albums Released field is required',
        ];
    }
}
