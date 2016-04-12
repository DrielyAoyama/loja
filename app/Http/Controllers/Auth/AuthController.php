<?php

namespace App\Http\Controllers\Auth;

use App\usuario;
use Validator;
use Auth;
use Session;
use Input, Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;


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
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
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
            'email' => 'required|max:200',
            'senha' => 'required|max:200|min:5',
        ]);
    }

    public function getIndex()
    {
        return Redirect::to(asset('/'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' =>   $data['usuario'],
            'senha' =>   $data['senha'],
        ]);
    }


    public function postAutenticar(Request $request) 
    {
        if(count($usuarios = Usuario::where('email','=',$request->input('email'))
                    ->where('senha','=',md5($request->input('senha')))
                        ->where('tipo_usuario','=','ADMIN')
                            ->where('liberado','=','S')->get())>0)
        {
            $remember = false;
            if($request->input('permanecer_logado')=='on')
            {
                $remember = true;
            }
            else
            {
                $remember = false;
            }           
            Auth::attempt(array('email' => $request->input('email'), 'senha' => md5($request->input('senha'))),$remember,true);            
        }
        if(Auth::check())
        {
           return Redirect::to(asset('adm/inicio'));
        }
        else
        {
           return Redirect::to(asset('/adm/painel'));
        }      
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to(asset('/adm/painel'));
    }

}
