<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Detalles;

class PedidoController extends Controller
{
    public function registrarPedido(){

        $id=Auth::id();
        $pedidos1 = Pedido::where('id', $id)->where('estado', "En marcha")->first(); 
        $pedidos2 = Pedido::where('id', $id)->where('estado', "Pendiente")->first(); 
        if(($pedidos1 != null)||($pedidos2 != null  )){
        return redirect(route('pedido'));
        }
        else{
        $pedido = new Pedido();
        $cliente  = Auth::id();
        $usuario = User::find($cliente);

        if($usuario->nombre != "admin"){
        $pedido->total = null;
        $pedido->estado = "En marcha";
        $pedido->id = $cliente;
        $pedido->save();
        return redirect(route('pedido'));  
        }
        }
    }
    public function añadirDetalles(Request $request){
        $detalle = new Detalles();
        $detalle->idpedido = $request ->idpedido;
        $detalle->idproducto = $request ->idproducto;
        $detalle->detallepedido = $request ->detallepedido;
        $detalle->anotaciones = $request ->anotaciones;
        $detalle->save();
    }
    public function obtenerpedidosJson(){
        $pedidos = Pedido::all();
        return response()->json(($pedidos));
    }
    public function obtenerpedidosporcliente($id){
        $disponible=true;
        $user = User::find($id);
        $pedidos = Pedido::where('id', $id)->get();
        foreach ($pedidos as &$pedido) {
            if($pedido->estado = "En marcha"){
                $disponible=false;
            }
        }
        if($disponible){
            return response()->json(($pedidos));
        }
    }
    public function editarpedido(Request $request)
    {   
        
        $pedido = Pedido::find($request->id);
        if (!$pedido) {
            return redirect(route('login'));
        }
        
        $pedido->total = $request->total;
        $pedido->save();
        
        return redirect(route('clientes'));
    }
    public function agregardetalles($id, $cantidad ,$anotaciones){
        $producto = Producto::find($id);    
        $idUsuario = Auth::id();
        $pedido = Pedido::where('id', $idUsuario)->where('estado', "En marcha")->first();
        if($pedido){
            $idpedido = $pedido->idpedido;
            $idproducto = $producto->idproducto;
            $detalle = Detalles::where('idpedido', $idpedido)->where('idproducto', $idproducto)->first();
            if($detalle && $detalle->exists()){
                if(($detalle->detallepedido == $cantidad) && ($detalle->anotaciones == $anotaciones)){
                    return redirect(route('pedido'));
                }
                else{
                    
                 $detalle->detallepedido = $cantidad;
                $detalle->anotaciones = $anotaciones;
                $detalle->save();   
                }
            }
            else{
              $detalles = new Detalles;
            $detalles->idpedido = $pedido->idpedido;
            $detalles->idproducto = $producto->idproducto;
            $detalles->detallepedido = $cantidad;
            $detalles->anotaciones = $anotaciones;
            $detalles->save();   
            }
        }
    }
    public function agregardetallessinanotaciones($id, $cantidad){
        $producto = Producto::find($id);    
        $idUsuario = Auth::id();
        $pedido = Pedido::where('id', $idUsuario)->where('estado', "En marcha")->first();
        if($pedido){
            $idpedido = $pedido->idpedido;
            $idproducto = $producto->idproducto;
            $detalle = Detalles::where('idpedido', $idpedido)->where('idproducto', $idproducto)->first();   
            if($detalle && $detalle->exists()){
                if(($detalle->detallepedido == $cantidad)){
                    return redirect(route('pedido'));
                }
                else{
                
                $detalle->detallepedido = $cantidad;
                $detalle->save();   
                }
            }
            else{
                
              $detalles = new Detalles;
            $detalles->idpedido = $pedido->idpedido;
            $detalles->idproducto = $producto->idproducto;
            $detalles->detallepedido = $cantidad;   
            $detalles->save();   
            }
        }
    }
    public function pedidoCliente(){
        $idUsuario = Auth::id();
        $pedido = Pedido::where('id', $idUsuario)->where('estado', "En marcha")->first();  
        $detalles = Detalles::where('idpedido', $pedido->idpedido)->get();
        $url = '/productosxdetalle?detalles=' . urlencode(serialize($detalles));
        return redirect($url);
    }
    public function carrito(){
        $idcliente = Auth::id();
        $pedido = Pedido::where('id', $idcliente)->where('estado', "En marcha")->first();
        if($pedido){
         $detalles = Detalles::where('idpedido', $pedido->idpedido)->get(); 
        foreach($detalles as $detalle){
            $productos[] = Producto::where('idproducto', $detalle->idproducto)->first(); 
        }  
        return $productos; 
        }
        
    }
    public function finalizarPedido(){
        $idusuario = Auth::id();
        $pedido  = Pedido::where('id', $idusuario)->where('estado', "En marcha")->first(); 
        $pedido->estado = "Pendiente";
        $pedido->save();
        return redirect(route('clienteindex'));
    }
    public function pedidosCliente(){
        $idusuario = Auth::id();
        $pedidos = Pedido::where('id', $idusuario)->get();
        return $pedidos;
    }
    public function pedidosAdmin(){
        $pedidos = Pedido::where('estado', "Pendiente")->get();
        return $pedidos;
    }
    public function hacerPedido($id){
        $pedido = Pedido::where('idpedido', $id)->first();
        $pedido->estado = "Hecho";
        $pedido->save();
        return redirect(route('pedidosenadmin'));
    }   
    
}
