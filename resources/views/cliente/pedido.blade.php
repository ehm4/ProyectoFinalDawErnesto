<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{asset('../css/pedido.css')}}" media="screen">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script defer src="{{asset('../js/main.js')}}"></script>
  <title>Pedido</title>
</head>

<body>
  <div id="nav">
    <div id="logo">
      <img id="imglogo" src="{{asset('../storage/logonamnam.png')}}" alt="Logo Ñam Ñam Rute">
    </div>
    <div id="rrss">
      <a href="https://www.facebook.com/people/%C3%91am-%C3%91am-Rute/100055149884082/">
        <img id="facebook" src="{{asset('../storage/logofacebook.png')}}" alt="Facebook">
      </a>
      <a href="https://www.instagram.com/namnamrute/">
        <img id="instagram" src="{{asset('../storage/logoinstagram.png')}}" alt="Instagram">
      </a>
    </div>
  </div>
  <div id="detallesformulario">

    <div id="formularios">
      <h1>Añadir productos al carrito</h1>
      <div id="formulario1">

        <select id="categoria" name="categoria" onChange="cargarProductos()">
          <option value=1 selected>Bocadillos</option>
          <option value=2>Hamburguesas</option>
          <option value=3>Patatas</option>
          <option value=4>Japos</option>
          <option value=5>Tapa</option>
          <option value=6>Perritos</option>
          <option value=7>Postres</option>
        </select>
        <select id="productos" name="productos">
        </select>
      </div>
      <div id="formulario2">
        <input type="number" id="cantidad" name="cantidad" required placeholder="Cantidad">
        <input type="text" id="anotaciones" name="anotaciones" placeholder="Anotaciones sobre el pedido">
      </div>
      <button name="agregardetalles" type="button" id="agregardetalles">
        <p id="textoboton">Añadir</p>
      </button>
    </div>


    <div id="detalles">
      <h2>Carrito</h2>
      <div id="carrito">

      </div>
    </div>

  </div>


  <div id="botones">

    <a href="{{route('finalizarpedido')}}" id="enlacemenu">
      <button name="button" type="button">
        <p>Finalizar Pedido</p>
      </button>
    </a>
    <a href="{{route('clienteindex')}}" id="enlacemenu">
      <button name="button" type="button">
        <p>Volver</p>
      </button>
    </a>
    <a href="{{route('pedidosxcliente')}}" id="enlacemenu">
      <button name="button" type="button">
        <p>Ver mis pedidos</p>
      </button>
    </a>
  </div>

</body>

</html>