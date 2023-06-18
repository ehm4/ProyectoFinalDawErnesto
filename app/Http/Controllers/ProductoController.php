<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use Illuminate\Support\Facades\Hash;
class ProductoController extends Controller
{
    public function register(Request $request){
        //validar los datos

        $producto = new Producto();

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        if(!$request->imagen == null){
        $string = "'../storage/".$request->imagen.".jpeg'";
        $producto->imagen = $string;
        }
        else{
        $producto->imagen = $request->imagen;
        }
        $producto->idcategoria = $request->categoria;
        $producto->save();
        return redirect(route('admin'));
    }
    public function listarProductos()
    {
        $productos = Producto::all();
        return view('admin.productos', compact('productos'));
    }
    public function findproductos($id)
    {
    $producto = Producto::find($id);
    return view('admin.editarproductos', ['producto' => $producto, 'id' => $id]);
    }
    public function editarproducto(Request $request)
    {   
        
        $producto = Producto::find($request->id);
        if (!$producto) {
            return redirect(route('login'));
        }
        
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;
        $producto->idcategoria = $request->categoria;
        
        $producto->save();
        
        return redirect(route('productos'));
    }
    public function eliminarProducto($id)
{
    $producto = Producto::find($id);

    if (!$producto) {
        return redirect(route('admin'));
    }
    $producto->delete();
    return redirect(route('productos'));
}
public function obtenerProductos()
{
    $productos = Producto::all();
    return response()->json(($productos));
}
public function cargarProductosPorCategoria($categoria)
{   
    $producto = Producto::where('idcategoria', $categoria)->get();
    return response()->json($producto);
    }
public function cargarProductosPorDetalles(Request $request){
    foreach ($request as $detalles) {
        foreach($detalles as $detalle){
        $producto = Producto::where('idproducto', $detalle->idproducto)->get();
        dd($producto);
        return response()->json($producto);
        }
    }
    
    }
public function cargarImagenes(){
    $productos = Producto::all();
    return $productos;
}
}
