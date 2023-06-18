<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/index.css')}}" media="screen">
  <title>Ñam Ñam Rute</title>
</head>
<body>
  
<div id="logo">
  <a href="https://www.facebook.com/people/%C3%91am-%C3%91am-Rute/100055149884082/">
    <img  id="rrss" src="{{asset('../storage/logofacebook.png')}}" alt="Facebook">
  </a>
  <img  id="imglogo" src="{{asset('../storage/logonamnam.png')}}" alt="Logo Ñam Ñam Rute">
  <a href="https://www.instagram.com/namnamrute/">
    <img id="rrss"src="{{asset('../storage/logoinstagram.png')}}" alt="Instagram">
  </a>
  </div>
  <div id="menu">
    <a href="{{route('clientes')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Usuarios</p>
      </button>
    </a>
    <a href="{{route('productos')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Comida</p>
      </button>
    </a>
    <a href="{{route('pedidosenadmin')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Pedidos</p>
      </button>
    </a>
    <a href="{{route('categoria')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Categorias</p>
      </button>
    </a>
    <a href="{{route('logout')}}" id="enlacemenu">
      <button name="button" type="button" id="botonmenu">
        <p id="textoboton">Logout</p>
      </button>
      </a>
  </div>
</body>
</html>