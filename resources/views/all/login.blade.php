<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/registro.css')}}" media="screen">
  <title>Log in</title>
</head>
<body>
<div class="container">
        <div class="logo">
            <img src="{{asset('../storage/logonamnam.png')}}" alt="Logo">
        </div>
        <form class="login-form" action="{{ route('inicia-sesion') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <div class="button-container">
                <a href="{{route('registro')}}" id="enlacemenu">
                    <button name="button" type="button" id="botonmenu">
                        <p id="textoboton">¿No tienes cuenta? Crea una.</p>
                    </button>
                </a>
                <button type="submit">Iniciar Sesión</button>
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