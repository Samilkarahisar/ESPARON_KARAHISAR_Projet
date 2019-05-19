<?php

namespace App\Http\Controllers\Auth;

use App\Business\Address;
use App\Business\User;
use App\Http\Controllers\Controller;
use App\Modeles\AddressDAO;
use App\Modeles\UserDAO;
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
    protected $redirectTo = '/login';

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Business\User
     */
    protected function create(array $data)
    {
        $address = new Address();
        $address->setFirstName($data['first_name']);
        $address->setLastName($data['last_name']);
        $addressData = $data['address'];
        $address->setStreet1($addressData ['street_1']);
        $address->setStreet2($addressData ['street_2']);
        $address->setStreet3($addressData ['street_3']);
        $address->setZipCode($addressData ['zip_code']);
        $address->setCity($addressData ['city']);
        $address->setCountry($addressData ['country']);

        $user = new User();
        $user->setAddress($address);
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);
        $user->setPassword(Hash::make($data['password']));

        $userDAO = new UserDAO();
        $userDAO->insert($user);

        return $user;
    }
}
