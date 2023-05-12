<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        return view('cliente\index');
    }


    public function create()
    {
        return view('all\registro');
    }


    public function store(Request $request)
    {   

        $cliente = new Cliente();
        $cliente->nombre = $request->post('nombre');
        $cliente->apellido = $request->post('apellido');
        $cliente->direccion = $request->post('direccion');
        $cliente->telefono = $request->post('telefono');
        $cliente->password = $request->post('password');
        $cliente->save();

        return redirect()->route('cliente.index')->with("succes", "Usuario agregado con éxito!");
    }

  

    public function show(Cliente $cliente)
    {
        //
    }

    
    
    public function edit(Cliente $cliente)
    {
        //
    }

    

    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    

    public function destroy(Cliente $cliente)
    {
        //
    }
}
