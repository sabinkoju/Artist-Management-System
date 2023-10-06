<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
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
            'artist_id' => 'required',
            'title' => 'required|string|max:255',
            'album_name' => 'required',
            'genre' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'artist_id.required' => 'Artist field is required',
            'title.required' => 'Title field is required',
            'album_name.required' => 'Album Name field is required',
            'genre.required' => 'Genre field is required',
        ];
    }
}
