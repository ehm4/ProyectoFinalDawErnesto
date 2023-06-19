<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pedido;
use App\Models\Detalles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index(){
        return redirect(route('menu'));
    }
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
        if(Auth::attempt($credenciales, $remember)){
            if(("admin@gmail.com" == $request->email)&&("admin" == $request->password)){
            return redirect(route('admin')); 
            }
            else{
            $request->session()->regenerate();
            return redirect(route('clienteindex'));   
            }
        }else{
            return redirect(route('login'));
        }
    }
    public function logout(Request $request){
        //validar los datos
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('menu'));

    }
    public function listarUsuarios()
    {
        $usuarios = User::all();
        return view('admin.clientes', compact('usuarios'));
    }
    public function find($id)
    {
    $cliente = User::find($id);
    return view('admin.editarclientes', ['cliente' => $cliente, 'id' => $id]);
    }
    public function editaradmin(Request $request)
    {   
        
        $cliente = User::find($request->id);
        
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->email = $request->email;
        $cliente->password = Hash::make($request->password);
        
        $cliente->save();
        
        return redirect(route('clientes'));
    }
    public function eliminarCliente($id){
    $cliente = User::find($id);

    if (!$cliente) {
        return redirect(route('admin'));
    }
    else{
        $pedidos = Pedido::where('id', $cliente->id)->get();
        foreach($pedidos as $pedido){
            $detalles = Detalles::where('idpedido', $pedido->idpedido)->get();
            foreach($detalles as $detalle){
                $detalle->delete();
            }
            $pedido->delete();
        }
        $cliente->delete();
        return redirect(route('clientes'));
    }
}
public function obtenerclientesJson(){
    $clientes = User::all();
    return response()->json(($clientes));
}
public function obtenerIdUsuarioAutenticado()
{
    if (Auth::check()) {
        $idUsuario = Auth::id();
        // Realiza las operaciones necesarias con la ID del usuario autenticado
        return $idUsuario;
    } else {
        // El usuario no está autenticado
        return null;
    }
}
}
