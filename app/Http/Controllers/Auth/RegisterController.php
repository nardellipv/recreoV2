<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Province;
use App\Region;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $provinces = Province::all();

        $provinceId = request()->input(['provincia']);

        if ($provinceId) {
            $regions = Region::where('province_id', $provinceId)
                ->get();

            $provinceName = Province::where('id', $provinceId)
                ->first();

                return view('auth.register', compact('provinces', 'provinceName','regions'));
        }

        return view('auth.register', compact('provinces'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_school'   => ['required', 'string', 'max:255'],
            'email_school'  => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address'       => ['required', 'string', 'max:255'],
            'postal_code'   => ['required', 'numeric'],
            'phone_school'  => ['required', 'numeric'],
            'director1'     => ['required', 'string', 'max:255'],
            'director2'     => ['required', 'string', 'max:255'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name_school.required'  => 'El nombre del colegio es obligatorio.',
            'name_school.string'    => 'El nombre del colegio debe ser un texto.',
            'name_school.max'       => 'El nombre del colegio no puede superar 255 caracteres.',
    
            'email_school.required' => 'El correo del colegio es obligatorio.',
            'email_school.email'    => 'El correo del colegio debe ser una dirección válida.',
            'email_school.max'      => 'El correo del colegio no puede superar 255 caracteres.',
            'email_school.unique'   => 'Este correo ya está registrado.',
    
            'address.required'      => 'La dirección es obligatoria.',
            'address.string'        => 'La dirección debe ser un texto.',
            'address.max'           => 'La dirección no puede superar 255 caracteres.',
    
            'postal_code.required'  => 'El código postal es obligatorio.',
            'postal_code.numeric'   => 'El código postal debe ser un número.',
    
            'phone_school.required' => 'El teléfono del colegio es obligatorio.',
            'phone_school.numeric'  => 'El teléfono del colegio debe ser un número.',
    
            'director1.required'    => 'El nombre del director es obligatorio.',
            'director1.string'      => 'El nombre del director debe ser un texto.',
            'director1.max'         => 'El nombre del director no puede superar 255 caracteres.',
    
            'director2.required'    => 'El nombre del vice director es obligatorio.',
            'director2.string'      => 'El nombre del vice director debe ser un texto.',
            'director2.max'         => 'El nombre del vice director no puede superar 255 caracteres.',
    
            'password.required'     => 'La contraseña es obligatoria.',
            'password.string'       => 'La contraseña debe ser un texto.',
            'password.min'          => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'    => 'La confirmación de contraseña no coincide.',
        ]);
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name_school' => $data['name_school'],
            'email_school' => $data['email_school'],
            'address' => $data['address'],
            'postal_code' => $data['postal_code'],
            'phone_school' => $data['phone_school'],
            'director1' => $data['director1'],
            'director2' => $data['director2'],
            'password' => Hash::make($data['password']),
            'province_id' => $data['province_id'],
            'region_id' => $data['region_id'],
            'first_time_school' => $data['first_time_school'],
            'admin' => 'N',
        ]);
    }
}
