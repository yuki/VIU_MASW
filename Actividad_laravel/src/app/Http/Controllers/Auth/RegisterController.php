<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\dni;
use App\Rules\iban;
use App\Rules\telefono;
use App\Rules\password;
use App\Rules\name;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // para poder añadir los paises sobreescribo la función original que está en:
    // /app/vendor/laravel/framework/src/Illuminate/Foundation/Auth/RegistersUsers.php
    public function showRegistrationForm()
    {
        $countries = Country::orderBy('name')->get();
        return view('auth.register', ['countries' => $countries]);
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
            // si ponemos sólo "alpha" no se acepant espacios para nombres y/o apellidos compuestos
            'name'      => ['required', new name, 'between:2,20'],
            'surname'   => ['required', new name, 'between:2,20'],
            'dni'       => ['required', new dni,'max:9'],
            'email'     => ['required', 'email:filter', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:10', new password, 'confirmed'],
            'telephone' => ['nullable', new telefono,'max:13'], // 13 porque es 12 y el "+", o 0034+9digitos
            'iban'      => ['required', new iban, 'max:24'],
            'about'     => ['nullable', 'string', 'between:20,250'],
            'country_id'=> ['nullable', 'integer']
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
            'name'      => $data['name'],
            'surname'   => $data['surname'],
            'dni'       => $data['dni'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'telephone' => $data['telephone'],
            'iban'      => str_replace(' ','',$data['iban']),
            'about'     => $data['about'],
            'country_id'=> $data['country_id'],
        ]);
    }
}
