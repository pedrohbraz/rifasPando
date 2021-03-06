<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Role;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Storage;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/perfil';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//    $arquivo    = $data['foto'];
//    $extension  = $arquivo->getClientOriginalExtension();
//    $image_name = 'user';
//    $path       = $arquivo->getRealPath();
//
//    Storage::put('users/'.$image_name.$data['email'].'.'.$extension,file_get_contents($path));
//  //  $user->foto = '/image/users/'.$image_name;
//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            'telefone'=>$data['telefone'],
//            'endereco'=>$data['endereco'],
//            'foto' =>'image/users/'.$image_name,
//        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->telefone = $data['telefone'];
        $user->endereco = $data['endereco'];

        $arquivo    = $data['foto'];
        $extension  = $arquivo->getClientOriginalExtension();
        $image_name = 'user'.$user->id;
        $path       = $arquivo->getRealPath();

        Storage::put('users/'.$image_name.'.'.$extension,file_get_contents($path));
        $user->foto = '/image/users/'.$image_name;
        $user->save();

        $role = Role::where('name','=','user')->first();

        $user->attachRole($role);

        return $user;

    }
}
