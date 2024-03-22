<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:50'],
            'surname' => ['string', 'max:50'],
            'address' => ['string', 'max:150'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'Il nome deve essere una stringa',
            'name.max' => 'Il nome deve contenere al massimo 50 caratteri',
            'surname.string' => 'Il cognome deve essere una stringa',
            'surname.max' => 'Il nome deve contenere al massimo 50 caratteri',
            'address.string' => 'Deve essere una stringa',
            'address.max' => 'L\' indirizzo deve contenere al massimo 150 caratteri',
            'email.email' => 'L\' email deve essere un indirizzo valido',
            'email.max' => 'L\' email deve contenere al massimo 255 caratteri'

        ];
    }
}
