<?php

namespace App\Http\Requests;

use App\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name_student' => 'required | min:2',
            'lastname_student' => 'required | min:2',
            'dni_student' => 'required | numeric',
            'birth_date' => 'required',
            'level_student' => 'required',
            'classroom' => 'required',
            'genre' => 'required',
            'phone_student' => 'required | numeric',
            'email_student' => 'required | email|unique:students,email_student,' . $this->user()->id,
            'first_time_student' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_student.required' => 'El nombre es requerido',
            'name_student.min' => 'El nombre debe ser real',
            'lastname_student.required' => 'El apellido es requerido',
            'lastname_student.min' => 'El apellido debe ser real',
            'dni_student.min' => 'El dni es requerido',
            'dni_student.numeric' => 'El DNI debe ser numérico',
            'birth_date.min' => 'La fecha de nacimiento es requerida',
            'level_student.required' => 'El nivel es requerido',
            'classroom.required' => 'El nivel de estudio es requerido',
            'genre.required' => 'El genero es requerido',
            'phone_student.required' => 'El teléfono es requerido',
            'phone_student.numeric' => 'El teléfono debe ser numérico',
            'email_student.required' => 'El email es requerido',
            'email_student.unique' => 'El email ya se encuentra registrado',
            'first_time_student.required' => 'Participa por primera vez es requerido',
        ];
    }
}
