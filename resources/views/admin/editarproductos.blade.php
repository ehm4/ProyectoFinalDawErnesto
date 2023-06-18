<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/registro.css')}}" media="screen">
  <title>Editar productos</title>
</head>
<body>
<div class="logo">
            <img src="{{asset('../storage/logonamnam.png')}}" alt="Logo">
</div>
<form action="{{ route('editar-producto') }}" method="POST">
            @csrf
            <div id="formulario">
            <input type="text" name="nombre" value="{{ $producto->nombre }}" required>
            <input type="text" name="descripcion" value="{{ $producto->descripcion }}" required>
            <input type="decimal" name="precio" value="{{ $producto->precio }}" required>
            <input type="text" name="imagen" value="{{ $producto->imagen }}" >
            <input type="text" name="categoria" value="{{ $producto->idcategoria }}" required>
            <input type="hidden" name="id" value="{{ $producto->idproducto }}">
            </div>
            <div class="button-container">
                <a href="{{route('admin')}}" id="enlacemenu">
                <button name="button" type="button" id="botonmenu">
                    <p id="textoboton">Cancelar</p>
                </button>
                </a>
                <a href="{{route('eliminar-producto', $producto->idproducto)}}" id="enlacemenu">
                <button name="button" type="button" id="botonmenu">
                    <p id="textoboton">Borrar producto</p>
                </button>
                </a>
                <a id="enlacemenu">
                 <button name="button"  id="botonmenu">
                    <p id="textoeditar">Editar</p>
                </button>   
                </a>
            
            </div>
        </form>
</body>
</html>