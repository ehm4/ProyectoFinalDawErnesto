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
    <a href="{{route('carta')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Carta</p>
      </button>
    </a>
    <a href="{{route('historia')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Historia</p>
      </button>
    </a>
    <a href="{{route('galeria')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Galería</p>
      </button>
    </a>
    <a href="{{route('contacto')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Contacto</p>
      </button>
    </a>
    <a href="{{route('login')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Login</p>
      </button>
    </a>
    <a href="{{route('registro')}}" id="enlacemenu">
      <button name="button" id="botonmenu">
        <p id="textoboton">Registrar</p>
      </button>
    </a>
  </div>
  <div id="footer">
    <p>Ñam Ñam Rute ©</p>
    <p>Todos los derechos reservados.</p>
  </div>
</body>
</html>