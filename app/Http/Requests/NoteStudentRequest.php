<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteStudentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_note' => 'required | numeric',
            'second_note' => 'nullable | numeric',
        ];
    }
    public function messages()
    {
        return [
            'first_note.required' => 'La nota teórica es requerida',
            'first_note.numeric' => 'La nota teórica debe ser numérica',
            'second_note.numeric' => 'La nota práctica debe ser numérica',
        ];
    }
}
