<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/formulario.css')}}" media="screen">
  <script defer src="{{asset('../js/main.js')}}"></script>
  <title>Carta</title>
</head>
<body>
            <div id="cantidad">
             <h1>
              Cantidad
            </h1>
            <input type="text" name="nombre" value="{{ $detalles->detallepedido }}" required readonly placeholder="Cantidad"> 
            </div>
            <div id="anotaciones">
             <h1>
              Anotaciones comanda
            </h1>
            <input type="text" name="apellido" value="{{ $detalles->anotaciones }}" required readonly placeholder="Anotaciones"> 
            </div>
            <div id="ayuda">Para editar los detalles de la comanda debes irte al apartado de pedidos y poner el mismo tipo de producto, pones la nueva cantidad y las nuevas anotaciones y clickeas en Añadir.</div>
<a href="{{route('pedido')}}" id="enlacemenu">
    <button name="button" type="button" id="botonmenu">
      <p id="textoboton">Volver</p>
    </button>
</a>
</body>
</html>