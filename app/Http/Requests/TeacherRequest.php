<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'space' => 'required',
            'level' => 'required',
            'other_school' => 'required',
            'phone' => 'required | numeric',
            'email' => 'required | email|unique:users,email,' . $this->user()->id,
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
            'space.required' => 'El espacio es requerido',
            'level.required' => 'El nivel es requerido',
            'other_shool.required' => 'Participo en otro establecimiento es requerido',
            'phone.required' => 'El teléfono es requerido',
            'phone.numeric' => 'El teléfono debe ser numérico',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya se encuentra registrado',
            'first_time.required' => 'Participa por primera vez es requerido',
        ];
    }
}
