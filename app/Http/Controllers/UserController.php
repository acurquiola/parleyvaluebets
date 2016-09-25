<?php

namespace App\Http\Controllers;


use Mail;
use Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
    	return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $user->status = 0;
    	return view('usuarios.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->except('password'));
        $confirm_token = str_random(100);
        $user->confirm_token = $confirm_token;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['confirm_token'] = $user->confirm_token;
         if($user->save()){
            Mail::send('emails.confirmacion', ['data' => $data], function($mail) use ($user) {
                $mail->from(env('MAIL_USERNAME'), 'INFO ParleyValueBets');
                $mail->subject('Confirmación de correo electrónico');
                $mail->to($user->email, $user->name);

            });
            return redirect()->action('UserController@index')->with('status', 'Usuario creado exitósamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserRequest $request)
    {
        $user = User::find($id);
        $user->update($request->except('password'));
        return redirect()->action('UserController@index')->with('status', 'Usuario modificado exitósamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id)){
            return redirect()->action('UserController@index')->with('status', 'Registro eliminado con éxito.');
        }
    }

    protected function sendConfirmation($id)
    {

        $user = User::find($id);   
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['confirm_token'] = $user->confirm_token;

        Mail::send('emails.confirmacion', ['data' => $data], function($mail) use ($user) {
            $mail->from(env('MAIL_USERNAME'), 'INFO ParleyValueBets');
            $mail->subject('Confirmación de correo electrónico');
            $mail->to($user->email, $user->name);

        });

        return redirect()->action('UserController@index')->with('status', 'Correo electrónico de confirmación enviado exitósamente.');
    }

    public function getPassword($email, $confirm_token)
    {
        if(Auth::user() != null){
            $historial = \App\Models\AccesoUsuario::find(session('acceso'));
            $historial->update(['fecha_salida' => \Carbon\Carbon::now()->toDateString(), 'hora_salida' => \Carbon\Carbon::now()->toTimeString()]); 
            Auth::logout();
        }

        $user = User::where('email', $email)->where('confirm_token', $confirm_token)->first();
        if($user){
            return view('home.password.index', compact('user'));
        }
    }

    public function postPassword(PasswordRequest $request)
    {
        $user = User::where('username', Request::get('username'))
                    ->where('confirm_token', Request::get('confirm_token'))
                    ->first();
        if($user)
        {
            if($user->status == 0){
                $newPassword = Request::get('password');
                $newToken = str_random(100);
                $user->update(['password' => \Hash::make($newPassword), 'confirm_token' => $newToken, 'status' => '1']);
                $status="Correo confirmado y contraseña establecida, ¡Puede iniciar sesión ahora!";
            }else{
                $status="Correo electrónico confirmado. Si no recuerda su contraseña haga clic en 'Olvidé mi contraseña'";
            };

        }else{
            $status="Correo electrónico incorrecto, comuníquese con el administrador.";
        };

            return redirect()->action('Auth\AuthController@getLogin')->with('status', $status);
    }
}