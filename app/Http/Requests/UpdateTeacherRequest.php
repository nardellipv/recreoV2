<?php

namespace App\Http\Requests;

use App\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
        $teacher = Teacher::find($this->id);
        
        return [
            'name_teacher' => 'required | min:2',
            'lastname_teacher' => 'required | min:2',
            'dni_teacher' => 'required | numeric',
            'space' => 'required',
            'level_teacher' => 'required',
            'other_school' => 'required',
            'phone_teacher' => 'required | numeric',
            'email_teacher' => 'required | email|unique:teachers,email_teacher,' . $teacher->id,
            'first_time_teacher' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_teacher.required' => 'El nombre es requerido',
            'name_teacher.min' => 'El nombre debe ser real',
            'lastname_teacher.required' => 'El apellido es requerido',
            'lastname_teacher.min' => 'El apellido debe ser real',
            'dni_teacher.min' => 'El dni es requerido',
            'dni_teacher.numeric' => 'El DNI debe ser numérico',
            'space.required' => 'El espacio es requerido',
            'level_teacher.required' => 'El nivel es requerido',
            'other_shool.required' => 'Participo en otro establecimiento es requerido',
            'phone_teacher.required' => 'El teléfono es requerido',
            'phone_teacher.numeric' => 'El teléfono debe ser numérico',
            'email_teacher.required' => 'El email es requerido',
            'email_teacher.unique' => 'El email ya se encuentra registrado',
            'first_time_teacher.required' => 'Participa por primera vez es requerido',
        ];
    }
}
