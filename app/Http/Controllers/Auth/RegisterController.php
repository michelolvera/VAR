<?php

namespace ArticulosReligiosos\Http\Controllers\Auth;

use ArticulosReligiosos\User;
use ArticulosReligiosos\Domicile;
use ArticulosReligiosos\State;
use ArticulosReligiosos\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'paternal_surname' => ['required', 'string', 'max:255'],
            'maternal_surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'rfc' => ['required', 'string', 'size:13'],
            'phone_number' => ['required', 'string', 'min:10', 'max:20'],
            'street' => ['required', 'string', 'max:255'],
            'address_number' => ['required', 'string', 'max:15'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'numeric', 'min:4'],
            'between_streets' => ['required', 'string', 'max:255'],
            'between_streets' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'countrie_id' => ['required', 'numeric'],
            'state_id' => ['required', 'numeric'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ArticulosReligiosos\User
     */
    protected function create(array $data)
    {
        $user = new User([
            'name' => $data['name'],
            'paternal_surname' => $data['paternal_surname'],
            'maternal_surname' => $data['maternal_surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rfc' => $data['rfc'],
            'phone_number' => $data['phone_number'],
            'admin' => false,
        ]);

        $user->save();

        $domicile = new Domicile([
            'address_number' => $data['address_number'],
            'street' => $data['street'],
            'between_streets' => $data['between_streets'],
            'neighborhood' => $data['neighborhood'],
            'zip_code' => $data['zip_code'],
            'city' => $data['city'],
        ]);

        $domicile->state()->associate(State::where('id', $data['state_id'])->first());
        $domicile->user()->associate($user);
        $domicile->save();
        return $user;
    }
}
