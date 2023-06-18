<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/clientes.css')}}" media="screen">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script defer src="{{asset('../js/cliente.js')}}"></script>
  <title>Pedidos</title>
</head>
<body>
<div class="container">
<div class="logo">
            <img src="{{asset('../storage/logonamnam.png')}}" alt="Logo">
</div>
    <h1>Lista de Pedidos</h1>

    <div id="pintar"></div>
    <a href="{{route('admin')}}" id="enlacemenu">
       <button name="button" type="button" id="botonmenu">
           <p id="textoboton">Menu</p>
      </button>
    </a>
  </div>
</body>
</html>