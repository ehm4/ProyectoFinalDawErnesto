<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/contacto.css')}}" media="screen">
  <title>Ñam Ñam Rute</title>
</head>
<body>
  <div id="nav">
    <div id="logo">
    <img  id="imglogo" src="{{asset('../storage/logonamnam.png')}}" alt="Logo Ñam Ñam Rute">
    </div>
    <div id="botonesmedio1">
          <a href="{{route('clienteindex')}}" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Home</p>
            </button>
          </a>
          <a href="{{route('cartacliente')}}" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Carta</p>
            </button>
          </a>
    </div>    
    <div id="botonesmedio2">
            <a href="{{route('pedido')}}" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Pedidos</p>
            </button>
          </a>
          <a href="{{route('contactocliente')}}" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Contacto</p>
            </button>
          </a>
    </div>
    <div id="rrss">
    <a href="https://www.facebook.com/people/%C3%91am-%C3%91am-Rute/100055149884082/">
    <img  id="facebook" src="{{asset('../storage/logofacebook.png')}}" alt="Facebook">
    </a>
    <a href="https://www.instagram.com/namnamrute/">
    <img id="instagram"src="{{asset('../storage/logoinstagram.png')}}" alt="Instagram">
    </a>
    </div>
  </div>
  <div id="medio">
    <div id="medio1">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d340.8016930359241!2d-4.369584149857241!3d37.32367664880949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6d838a7ee2227d%3A0x618cf4e4527e3989!2zw5FhbSEgw5FhbSEgUnV0ZQ!5e0!3m2!1ses!2ses!4v1686913192987!5m2!1ses!2ses" width="600" height="450"></iframe>
    </div>
    <div id="medio2">
      <h1>Nuestras redes sociales:</h1>
      <div class="medio-logos">

        <a href="https://www.facebook.com/people/%C3%91am-%C3%91am-Rute/100055149884082/">
          <img  id="facebook" src="{{asset('../storage/logofacebook.png')}}" alt="Facebook"><p id="textorrss">Instagram</p>
        </a>
        <a href="https://www.instagram.com/namnamrute/">
          <img id="instagram"src="{{asset('../storage/logoinstagram.png')}}" alt="Instagram"><p id="textorrss">Facebook</p>
        </a>
      </div>
    </div>
      
    </div>
    <div id="textofooter">
      <h1>Gracias por tu confianza, Ñam Ñam!</h1>
    </div>
  </div>
  </div>
</body>
</html>