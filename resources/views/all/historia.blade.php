<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/historia.css')}}" media="screen">
  <title>Ñam Ñam Rute</title>
</head>
<body>
  <div id="nav">
    <div id="logo">
    <img  id="imglogo" src="{{asset('../img/logonamnam.png')}}" alt="Logo Ñam Ñam Rute">
    </div>
    <div id="rrss">
    <a href="https://www.facebook.com/people/%C3%91am-%C3%91am-Rute/100055149884082/">
    <img  id="facebook" src="{{asset('../img/logofacebook.png')}}" alt="Facebook">
    </a>
    <a href="https://www.instagram.com/namnamrute/">
    <img id="instagram"src="{{asset('../img/logoinstagram.png')}}" alt="Instagram">
    </a>
    </div>
  </div>
  <div id="medio">
    <div id="medio1">
        <img id="fotoernesto" src="{{asset('../img/fotoernesto.png')}}" alt="Foto de nuestro Chef">
        <div id="botonesmedio1">
          <a href="{{route('clienteindex')}}" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Home</p>
            </button>
          </a>
          <a href="#" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Carta</p>
            </button>
          </a>
        </div>
    </div>
    <div id="medio2">
      <div id="textomedio">
        <h1 id="titulohistoria">Historia</h1>
        <p id="textohistoria">Con más de 25 años de experiencia en el sector, gestionando una de las mejores cafeterías de instituto en Andalucía, en julio del 2020 nace Ñam Ñam Rute. Bocadillos y hamburguesas creativas son el buque insignia de este local.
        <br> Son el buque insignia de este local, que fusionan sabores típicos nuestros con productos asiáticos o americanos. Apostando siempre por la calidad.
        </p>
      </div>
      <div id="botonesmedio2">
          <a href="#" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Pedidos</p>
            </button>
          </a>
          <a href="#" id="enlacemenu">
            <button name="button" id="botonmenu">
            <p id="textoboton">Contacto</p>
            </button>
          </a>
        </div>
    </div>
  </div>
</body>
</html>