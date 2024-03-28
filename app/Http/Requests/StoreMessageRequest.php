<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:150',
            'message' => 'required|max:300'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome dev\'essere una stringa.',
            'name.max' => 'Il nome dev\'essere al massimo di 50 caratteri.',
            'email.required' => 'La mail è obbligatoria.',
            'email.string' => 'La mail dev\'essere una stringa.',
            'email.max' => 'La mail dev\'essere al massimo di 255 caratteri.',
            'email.email' => 'La mail dev\'essere una mail! (Contenere un @ e un .).',
            'message.required' => 'Il testo è obbligatorio',
            'message.max' => 'Il contenuto non deve superare i 300 caratteri'
        ];
    }
}
