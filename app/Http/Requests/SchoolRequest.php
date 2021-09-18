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
            'name' => 'required | min:2',
            'phone' => 'required | numeric',
            'address' => 'required | min:2',
            'postal_code' => 'required | numeric',
            'email' => 'required | email|unique:users,email,' . $this->user()->id,
            'director1' => 'required',
            'director2' => 'required',
            'type' => 'required',
            'first_time' => 'required',
            'sede' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre del colegio es requerido',
            'name.min' => 'El nombre del colegio debe ser real',
            'phone.required' => 'El teléfono es requerido',
            'phone.numeric' => 'El teléfono debe ser numérico',
            'address.required' => 'La dirección es requerido',
            'address.min' => 'La dirección debe ser real',
            'postal_code.required' => 'El Código Postal es requerido',
            'postal_code.numeric' => 'El Código Postal debe ser numérico',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya esta en uso',
            'director1.min' => 'El nombre del Director es requerido',
            'director2.min' => 'El nombre del Vice Director es requerido',
            'type.required' => 'El tipo de gestión es requerido',
            'first_time.required' => 'Participa por primera vez es requerido',
            'sede.required' => 'La sede es requerida',
        ];
    }
}
