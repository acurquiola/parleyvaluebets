<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Validator;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;

use GeoIP;

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
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        //$this->registrar = $registrar;

        $this->middleware('guest', ['except' => ['getLogout', 'getLogoutRemember']]);
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
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('index');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $inputs = Request::all();
        $validator = Validator::make($inputs, [
            'username' => 'required', 'password' => 'required',
        ]);


        $credentials = Request::only('username', 'password');
        

        if ($this->auth->attempt($credentials, Request::has('remember'))){
                session(['username' => Request::get('username')]);
                $user      = \App\Models\User::where('username', session('username'))->first();
                $location  = GeoIP::getLocation();
                $historial = new \App\Models\AccesoUsuario();
                $historial->fecha_entrada = \Carbon\Carbon::now()->toDateString();
                $historial->hora_entrada  = \Carbon\Carbon::now()->toTimeString();
                $historial->user_id       = $user->id;
                $historial->ip            = Request::ip();
                $historial->pais          = $location['country'];
                $historial->save();
                session(['acceso' => $historial->id]);
            return redirect()->intended($this->redirectPath());
        };
        
        return redirect($this->loginPath())
                    ->withInput(Request::only('username', 'password'))
                    ->withErrors([
                        'username' => $this->getFailedLoginMessage(),
                    ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'ACCESO DENEGADO: Identificación incorrecta';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $historial = \App\Models\AccesoUsuario::find(session('acceso'));
        $historial->update(['fecha_salida' => \Carbon\Carbon::now()->toDateString(), 'hora_salida' => \Carbon\Carbon::now()->toTimeString()]); 
        $this->auth->logout();
        
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }
}
