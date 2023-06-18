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
        <form action="{{ route('validar-registro') }}" method="POST">
            @csrf
            <div id="formulario">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="tel" name="telefono" placeholder="Teléfono" required>
            <input type="password" name="password" placeholder="Contraseña" required>    
            </div>
            <div class="button-container">
            <a href="{{route('login')}}" id="enlacemenu">
                <button name="button" type="button" id="botonmenu">
                    <p id="textoboton">Iniciar Sesión</p>
                </button>
            </a>
                <button type="submit">Registrar</button>
            </div>
        </form>
        <footer class="footer">
            <div class="footer-left">
                <img src="{{asset('../storage/logonamnam.png')}}" alt="Logo Footer">
            </div>
            <div class="footer-right">
                <a href="https://www.facebook.com/people/%C3%91am-%C3%91am-Rute/100055149884082/"><img src="{{asset('../storage/logofacebook.png')}}" alt="Icono Facebook"></a>
                <a href="https://www.instagram.com/namnamrute/"><img src="{{asset('../storage/logoinstagram.png')}}" alt="Icono Instagram"></a>
            </div>
        </footer>
    </div>
</body>
</html>