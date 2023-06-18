<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function register(Request $request){
        $disponible = Categoria::find($request->idcategoria);
        if($disponible){

        }
        else{
            $categoria = new Categoria;
            $categoria->nombre = $request->nombre;
            $categoria->save();
        return redirect(route('categoria'));
        }
    }
    public function obtenercategoriasjson(){
        $categorias = Categoria::all();
        return $categorias;
    }
    public function editarCategoria($id)
    {
    $categoria = Categoria::find($id);
    return view('admin.editarcategoria', ['categoria' => $categoria, 'id' => $id]);
    }
    public function editarCategoriaformulario(Request $request){
        
        $producto = Categoria::find($request->id);
        if (!$producto) {
            return redirect(route('login'));
        }
        $producto->nombre = $request->nombre;
        $producto->save();
        return redirect(route('categoria'));
    }
    public function borrarCategoria($id){
        $categoria = Categoria::where('idcategoria', $id)->first();
        $producto = Producto::where('idcategoria', $id)->get();
        if($producto){
         $categoria->delete();   
        }
        return redirect(route('categoria'));
    }
    }

