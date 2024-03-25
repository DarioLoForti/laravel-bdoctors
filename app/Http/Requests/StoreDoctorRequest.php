<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'city' => 'required|max:150',
            'phone' => 'nullable|numeric',
            'image' => 'nullable|image|size:5120',
            'cv' => 'nullable|mimes:jpg,png,txt,pdf,docx|size:2048',
            'services' => 'nullable|max:300',
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'La città è obbligatoria.',
            'city.max' => 'La lunghezza del campo non deve superare i 150 caratteri.',
            'phone.numeric' => 'Questo campo accetta solo valori numerici.',
            'image.image' => 'Puoi inserire solo un file di tipo immagine.',
            'image.size' => 'L\' immagine deve essere grande al massimo 5 mb.',
            'cv.mimes' => 'Puoi inserire solo file di tipo: .jpg , .png , .txt , .pdf , .docx.',
            'cv.size' => 'Il CV deve essere grande al massimo 2mb.',
            'services.max' => 'La lunghezza del campo non deve superare i 300 caratteri.'
        ];
    }
}
