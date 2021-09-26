<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'name_school' => 'required | min:2',
            'phone_school' => 'required | numeric',
            'address' => 'required | min:2',
            'postal_code' => 'required | numeric',
            'email_school' => 'required | email|unique:users,email_school,' . $this->user()->id,
            'director1' => 'required',
            'director2' => 'required',
            'type' => 'required',
            'first_time_school' => 'required',
            'sede' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_school.required' => 'El nombre del colegio es requerido',
            'nam_schoole.min' => 'El nombre del colegio debe ser real',
            'phone_school.required' => 'El teléfono es requerido',
            'phone_school.numeric' => 'El teléfono debe ser numérico',
            'address.required' => 'La dirección es requerido',
            'address.min' => 'La dirección debe ser real',
            'postal_code.required' => 'El Código Postal es requerido',
            'postal_code.numeric' => 'El Código Postal debe ser numérico',
            'email_school.required' => 'El email es requerido',
            'email_school.unique' => 'El email ya esta en uso',
            'director1.min' => 'El nombre del Director es requerido',
            'director2.min' => 'El nombre del Vice Director es requerido',
            'type.required' => 'El tipo de gestión es requerido',
            'first_time_school.required' => 'Participa por primera vez es requerido',
            'sede.required' => 'La sede es requerida',
        ];
    }
}
