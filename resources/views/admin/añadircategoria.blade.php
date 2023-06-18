<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/registro.css')}}" media="screen">
  <title>Registrar</title>
</head>
<body>
<div class="container">
        <div class="logo">
            <img src="{{asset('../storage/logonamnam.png')}}" alt="Logo">
        </div>
        <form action="{{ route('validar-registro-categorias') }}" method="POST">
            @csrf
            <div id="formulario">
            <input type="text" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="button-container">
                <a href="{{route('admin')}}" id="enlacemenu">
                <button name="button" type="button" id="botonmenu">
                    <p id="textoboton">Cancelar</p>
                </button>
                </a>
                <a id="enlacemenu">
                 <button name="button"  id="botonmenu">
                    <p id="textoeditar">Añadir</p>
                </button>   
                </a>
            
            </div>
        </form>
    </div>
</body>
</html>