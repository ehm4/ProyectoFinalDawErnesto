<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [ClienteController::class, 'index'])->name('home');


Route::view('login', "all/login")->name('login');
Route::view('registro', "all/registro")->name('registro');
Route::view('historia', "all/historia")->name('historia');
Route::view('historiacliente', "cliente/historia")->name('historiacliente');
Route::view('contacto', "all/contacto")->name('contacto');
Route::view('contactocliente', "cliente/contacto")->name('contactocliente');
Route::view('menu', "all/index")->name('menu');
Route::view('index', "cliente/index")->middleware('auth')->name('clienteindex');
Route::view('menuadmin', "admin/menu")->middleware('admin')->name('admin');
Route::view('editaradmin', "admin/editarclientes")->middleware('admin')->name('editaradmin');
Route::view('productos', "admin/productos")->middleware('admin')->name('productos');
Route::view('añadirproducto', "admin/añadirproducto")->middleware('admin')->name('añadirproducto');
Route::view('añadircategoria', "admin/añadircategoria")->middleware('admin')->name('añadircategoria');
Route::view('pedido', "cliente/pedido")->middleware('auth')->name('pedido');
Route::view('pedidosxcliente', "cliente/pedidos")->middleware('auth')->name('pedidosxcliente');
Route::view('pedidosenadmin', "admin/pedidos")->middleware('admin')->name('pedidosenadmin');
Route::view('cartacliente', "cliente/carta")->middleware('auth')->name('cartacliente');
Route::view('carta', "all/carta")->name('carta');
Route::view('formulario', "cliente/formulario")->middleware('auth')->name('formulariopedido');
Route::view('categorias', "admin/categorias")->middleware('admin')->name('categoria');


Route::post('/validar-registro',[ClienteController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion',[ClienteController::class, 'login'])->name('inicia-sesion');
Route::get('/logout',[ClienteController::class, 'logout'])->name('logout');
Route::get('/clientes', [ClienteController::class, 'listarUsuarios'])->middleware('admin')->name('clientes');
Route::get('/clientes/{id}/editar', [ClienteController::class, 'find'])->middleware('admin')->name('find');
Route::post('/editar-clientes', [ClienteController::class, 'editaradmin'])->middleware('admin')->name('editar-clientes');
Route::get('/eliminar/{id}/cliente/', [ClienteController::class, 'eliminarCliente'])->middleware('admin')->name('eliminar-cliente');
Route::get('/productos', [ProductoController::class, 'listarProductos'])->middleware('admin')->name('productos');
Route::get('/productos/{id}/editar', [ProductoController::class, 'findproductos'])->middleware('admin')->name('findproductos');
Route::post('/editar-productos', [ProductoController::class, 'editarproducto'])->middleware('admin')->name('editar-producto');
Route::post('/validar-registro-productos',[ProductoController::class, 'register'])->middleware('admin')->name('validar-registro-productos');
Route::post('/validar-registro-categorias',[CategoriaController::class, 'register'])->middleware('admin')->name('validar-registro-categorias');
Route::get('/eliminar/{id}/producto/', [ProductoController::class, 'eliminarProducto'])->middleware('admin')->name('eliminar-producto');

Route::get('/productosjson', [ProductoController::class, 'obtenerProductos'])->name('productosjson');
Route::get('/clientesjson', [ClienteController::class, 'obtenerclientesJson'])->middleware('admin')->name('clientesjson');
Route::get('/categoriasjson', [CategoriaController::class, 'obtenercategoriasjson'])->middleware('admin')->name('categoriasjson');
Route::get('/carrito', [PedidoController::class, 'carrito'])->middleware('auth')->name('carrito');

//Pedidos
Route::get('/registro-pedido',[PedidoController::class, 'registrarPedido'])->middleware('auth')->name('detalles');
Route::get('/productos/{categoria}', [ProductoController::class,'cargarProductosPorCategoria'])->middleware('auth')->name('productosxcategoria');
Route::get('/detalles/{producto}/{cantidad}/{anotaciones}', [PedidoController::class,'agregardetalles'])->middleware('auth')->name('agregardetalles');
Route::get('/detalles/{producto}/{cantidad}', [PedidoController::class,'agregardetallessinanotaciones'])->middleware('auth')->name('agregardetallessinanotaciones');
Route::get('/finalizarpedido', [PedidoController::class,'finalizarpedido'])->middleware('auth')->name('finalizarpedido');
Route::get('/productosxdetalle/{variable}', [ProductoController::class,'cargarProductosPorDetalles'])->middleware('auth')->name('productosxdetalle');
Route::get('/formulario/{id}', [DetallesController::class, 'mostrarFormulario'])->middleware('auth')->name('formulario-pedido');
Route::get('/hecho/{id}', [PedidoController::class, 'hacerPedido'])->middleware('auth')->name('hacerpedido');
Route::get('/finalizarpedido', [PedidoController::class, 'finalizarPedido'])->middleware('auth')->name('finalizarpedido');
Route::get('/pedidoscliente', [PedidoController::class, 'pedidosCliente'])->middleware('auth')->name('pedidoscliente');
Route::get('/pedidosadmin', [PedidoController::class, 'pedidosAdmin'])->middleware('auth')->name('pedidosadmin');
Route::get('/borrar/{id}', [DetallesController::class, 'borrarDetalle'])->middleware('auth')->name('borrar-detalle');


//Galería
Route::get('/cargarImagenes', [ProductoController::class, 'cargarImagenes'])->name('cargarimagenes');
Route::view('galeria', "all/galeria")->name('galeria');
Route::view('galeriacliente', "cliente/galeria")->name('galeriacliente');

//Categorias
Route::post('/editar-categoria', [CategoriaController::class, 'editarCategoriaformulario'])->middleware('admin')->name('editar-categoria');
Route::get('/categoria/{id}/editar', [CategoriaController::class, 'editarCategoria'])->middleware('admin')->name('editar-categoria-id');
Route::get('/categoria/{id}/agregar/', [CategoriaController::class, 'agregarCategoria'])->middleware('admin')->name('agregar-categoria');
Route::get('/categoria/{id}/borrar/', [CategoriaController::class, 'borrarCategoria'])->middleware('admin')->name('borrar-categoria');
