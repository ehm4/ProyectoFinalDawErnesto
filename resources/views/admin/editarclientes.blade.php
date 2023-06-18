<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/registro.css')}}" media="screen">
  <title>Editar cliente</title>
</head>
<body>
<div class="logo">
            <img src="{{asset('../storage/logonamnam.png')}}" alt="Logo">
</div>
<form action="{{ route('editar-clientes') }}" method="POST">
            @csrf
            <div id="formulario">
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>
            <input type="text" name="apellido" value="{{ $cliente->apellido }}" required>
            <input type="email" name="email" value="{{ $cliente->email }}" required>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}" required>
            <input type="text" name="password" value="{{ $cliente->password }}" required>
            <input type="hidden" name="id" value="{{ $cliente->id }}">
            </div>
            <div class="button-container">
                <a href="{{route('admin')}}" id="enlacemenu">
                <button name="button" type="button" id="botonmenu">
                    <p id="textoboton">Cancelar</p>
                </button>
                </a>
                <a href="{{route('eliminar-cliente', $cliente->id)}}" id="enlacemenu">
                <button name="button" type="button" id="botonmenu">
                    <p id="textoboton">Borrar cliente</p>
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