<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteInterStudentRequest extends FormRequest
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
            'first_note_inter' => 'required | numeric',
            'second_note_inter' => 'nullable | numeric',
        ];
    }
    public function messages()
    {
        return [
            'first_note_inter.required' => 'La nota teórica es requerida',
            'first_note_inter.numeric' => 'La nota teórica debe ser numérica',
            'second_note_inter.numeric' => 'La nota práctica debe ser numérica',
        ];
    }
}
