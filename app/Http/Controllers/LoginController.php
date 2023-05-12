<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
    
    public function register(Request $request){
        //validar los datos

        $user = new User();

        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect(route('clienteindex'));
    }
    public function login(Request $request){
        //validacion

        $credenciales = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = ($request->has('remember') ? true : false);
        print_r(Auth::attempt($credenciales, $remember));
        if(Auth::attempt($credenciales, $remember)){

            $request->session()->regenerate();
            return redirect(route('clienteindex'));
        }else{
            return redirect(route('login'));
        }
    }
    public function logout(Request $request){
        //validar los datos
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));

    }
}
