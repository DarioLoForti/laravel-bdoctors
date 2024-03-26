<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRegisterRequest extends FormRequest
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
            'surname' => 'required|string|max:50',
            'address' => 'required|string|max:150',
            'email' => 'required|string|email|max:255',
            'password' => 'required',/* Rules\Password::defaults(), */
            'city' => 'required|max:150',
            'phone' => 'nullable|numeric',
            'image' => 'nullable|image',
            'cv' => 'nullable|mimes:pdf,docx',
            'services' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome dev\'essere una stringa.',
            'name.max' => 'Il nome dev\'essere al massimo di 50 caratteri.',
            'surname.required' => 'Il cognome è obbligatorio.',
            'surname.string' => 'Il cognome dev\'essere una stringa.',
            'surname.max' => 'Il cognome dev\'essere al massimo di 50 caratteri.',
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'address.string' => 'L\'indirizzo dev\'essere una stringa.',
            'address.max' => 'L\'indirizzo dev\'essere al massimo di 150 caratteri.',
            'email.required' => 'La mail è obbligatoria.',
            'email.string' => 'La mail dev\'essere una stringa.',
            'email.max' => 'La mail dev\'essere al massimo di 255 caratteri.',
            'email.email' => 'La mail dev\'essere una mail! (Contenere un @ e un .).',
            'password.required' => 'Devi inserire una passoword!',
            'city.required' => 'La città è obbligatoria.',
            'city.max' => 'La lunghezza del campo non deve superare i 150 caratteri.',
            'phone.numeric' => 'Questo campo accetta solo valori numerici.',
            'image.image' => 'Puoi inserire solo un file di tipo immagine.',
            'cv.mimes' => 'Puoi inserire solo file di tipo:.pdf , .docx.',
        ];
    }
}
