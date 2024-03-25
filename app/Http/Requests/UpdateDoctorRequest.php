<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'phone' => 'nullable|numeric|max_digits:15',
            'image' => 'nullable|image',
            'cv' => 'nullable|mimes:pdf,docx',
            'services' => 'nullable|max:300',
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'La città è obbligatoria.',
            'city.max' => 'La lunghezza del campo non deve superare i 150 caratteri.',
            'phone.numeric' => 'Questo campo accetta solo valori numerici.',
            'phone.max_digits' => 'Il numero non può superare i 15 caratteri.',
            'image.image' => 'Puoi inserire solo un file di tipo immagine.',
            'cv.mimes' => 'Puoi inserire solo file di tipo:.pdf , .docx.',
            'services.max' => 'La lunghezza del campo non deve superare i 300 caratteri.'
        ];
    }
}
