<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Detalles;
use Illuminate\Support\Facades\Auth;

class DetallesController extends Controller
{
    
    public function mostrarFormulario($id)
    {
        $idusuario=Auth::id();
        $pedido = Pedido::where('id', $idusuario)->where('estado', "En marcha")->first();
        $idpedido = $pedido->idpedido;
        $detalles = Detalles::where('idpedido', $idpedido)->where('idproducto', $id)->first();
        return view('cliente.formulario', ['detalles' => $detalles, 'idproducto' => $id]);
    }
    public function borrarDetalle($id)
    {
    $idusuario = Auth::id();
    $pedido = Pedido::where('id', $idusuario)->where('estado', "En marcha")->first();
    $idpedido = $pedido->idpedido;
    $detalle = Detalles::where('idpedido', $idpedido)->where('idproducto', $id)->first();
    $detalle->delete();
    return redirect(route('pedido'));

    }
}
