<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required | min:2',
            'lastname' => 'required | min:2',
            'dni' => 'required | numeric',
            'birth_date' => 'required',
            'level' => 'required',
            'classroom' => 'required',
            'genre' => 'required',
            'phone' => 'required | numeric',
            'first_time' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe ser real',
            'lastname.required' => 'El apellido es requerido',
            'lastname.min' => 'El apellido debe ser real',
            'dni.min' => 'El dni es requerido',
            'dni.numeric' => 'El DNI debe ser numérico',
            'birth_date.min' => 'La fecha de nacimiento es requerida',
            'level.required' => 'El nivel es requerido',
            'classroom.required' => 'El nivel de estudio es requerido',
            'genre.required' => 'El genero es requerido',
            'phone.required' => 'El teléfono es requerido',
            'phone.numeric' => 'El teléfono debe ser numérico',
            'first_time.required' => 'Participa por primera vez es requerido',
        ];
    }
}
