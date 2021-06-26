<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DoctorCode;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Exception;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['utype'] == 'Doctor') {
            $code = DoctorCode::where('code', '=', $data['doctor_code'])->first();
            if ($code && $code->user_id != null) {
                    throw ValidationException::withMessages(['Code is used by other user']);
            }
        }
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'utype' => ['required'],
            'doctor_code' => ['filled', 'exists:doctor_codes,code', 'string', 'regex: /\b[0-9a-f]{8}\b-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-\b[0-9a-f]{12}\b/u']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'utype' => $data['utype'],
            'doctor_code' => $data['doctor_code'] ?? null,
        ]);
        $user->save();
        if ($user->doctor_code != null) {
            $code = DoctorCode::where('code', '=', $data['doctor_code'])->first();
            $code->update([
                'user_id' => $user->id,
            ]);
        }
        return $user;
    }
}
