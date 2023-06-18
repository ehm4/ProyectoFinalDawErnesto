"use strict"
// Redirects to the menu page
function menu(){
  window.location.href = "http://127.0.0.1:8000/index";
}
// Fetches data from the specified URL and returns it as JSON
async function bbdd(url){
  const response = await fetch(url);
  if (!response.ok) {
    
  throw new Error(`HTTP error! status: ${response.status}`);
  }
  return response.json();
}
// Executes different functions based on the current page URL
document.addEventListener('DOMContentLoaded', function() {
  var rutaActual = window.location.href;
  if((rutaActual == "http://127.0.0.1:8000/productos")){
    productos()
  }
  if(rutaActual == "http://127.0.0.1:8000/carta" || (rutaActual == "http://127.0.0.1:8000/cartacliente")){
    carta()
  }
  if(rutaActual == "http://127.0.0.1:8000/clientes"){
    clientes()
  }
  if(rutaActual == "http://127.0.0.1:8000/pedido"){
    crearPedido();
    vaciarCarrito();
    cargarProductos()
    pintarCarrito()
  }
  if(rutaActual == "http://127.0.0.1:8000/formulario"){
    cargarFormulario()
  }
  if(rutaActual == "http://127.0.0.1:8000/pedidoscliente"){
    pedidosCliente()
  }
  if(rutaActual == "http://127.0.0.1:8000/categorias"){
    categorias()
  }
});
// Fetches and displays the menu items for the "carta" page
async function carta(){
  let listado = "";
  let cartabocadillos="<div class=listas><h1>Bocadillos</h1>";
  let cartahamburguesas="<div class=listas><h1>Hamburguesas</h1>";
  let cartapatatas="<div class=listas><h1>Patatas</h1>";
  let cartajapo="<div class=listas><h1>Japo</h1>"
  let cartatapas="<div class=listas><h1>Tapas</h1>"
  let cartaperritos="<div class=listas><h1>Perritos</h1>"
  let cartapostres="<div class=listas><h1>Postres</h1>"
  let json = await bbdd("/productosjson");
  for (let i = 0; i < json.length; i++) {
    let producto = json[i];
    console.log(producto.idcategoria);

      if(producto.idcategoria == 1){
        cartabocadillos+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul>";
      }
      else if(producto.idcategoria == 2){
        cartahamburguesas+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul>";
      }
      else if(producto.idcategoria == 3){
        cartapatatas+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul></div>";
      }
      else if(producto.idcategoria == 4){
        cartajapo+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul></div></div>";
      }
      else if(producto.idcategoria == 5){
        cartatapas+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul></div></div>";
      }
      else if(producto.idcategoria == 6){
        cartaperritos+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul></div></div>";
      }
      else if(producto.idcategoria == 7){
        cartapostres+="<ul class=product-list><li><span class=product-name>"+producto.nombre+"</span> -<span class=product-description>"+producto.descripcion+"</span> -<span class=product-price>"+producto.precio+" €</span> </li></ul></div></div>";
      }
      listado=cartabocadillos+"</div>"+cartahamburguesas+"</div>"+cartapatatas+"</div>"+cartajapo+"</div>"+cartatapas+"</div>"+cartaperritos+"</div>"+cartapostres;
      console.log(listado);  
  }
  return pintar(listado);
}
// Fetches and displays the products
async function productos(){
  let listado = "";
  let json = await bbdd("/productosjson");
  for (let i = 0; i < json.length; i++) {
    let producto = json[i];
    listado+="<ul class=`product-list`><li><span class=`product-name`>"+producto.nombre+"</span> -<span class=`product-description`>"+producto.descripcion+"</span> -<span class=`product-price`>"+producto.precio+"</span> -<span class=`product-img`>"+producto.imagen+"</span>-<span class=`product-img`>"+producto.categoria+"</span>-<span class=`product-edit`><a href=/productos/"+producto.idproducto+"/editar>Editar</a></span></li></ul>";
  }
  return pintar(listado);
}
// Retrieves and displays a list of clients
async function clientes(){
  let listado = "";
  let json = await bbdd("/clientesjson");
  console.log(json)
  for (let i = 0; i < json.length; i++) {
    let cliente = json[i];
    listado+="<ul class=`client-list`><li><span class=`client-name`>"+cliente.nombre+"</span> -<span class=`client-lastname`>"+cliente.apellido+"</span> -<span class=`client-email`>"+cliente.email+"</span> -<span class=`client-telephone`>"+cliente.telefono+"</span>-<span class=`client-password`>"+cliente.password+"</span>-<span class=`client-edit`><a href=/clientes/"+cliente.id+"/editar>Editar</a></span>-<span class=`product-borrar`><a href=/eliminar/"+cliente.id+"/cliente>Borrar</a></span></li></ul>";
  }
  return pintar(listado);
}
// Displays the provided list in the "pintar" element
function pintar(listado){
  const texto = listado;
  console.log(texto)
  document.getElementById("pintar").innerHTML =""+texto;
}
// Loads products based on selected category
function cargarProductos() {
  var categoria = document.getElementById('categoria').value;
  // Realizar la solicitud Ajax para cargar los productos por categoría
  $.ajax({
      url:"/productos/"+categoria,
      method: 'GET',
      success: function(response) {
          // Limpiar el menú desplegable de productos
          $('#productos').empty();
          console.log(response);
          // Agregar las opciones de productos al menú desplegable
          response.forEach(function(producto) {
              $('#productos').append('<option value="' + producto.idproducto + '">' + producto.nombre + '</option>');
          });
      },
      error: function(error) {
          console.log(error);
      }
  });
}
document.getElementById("agregardetalles").addEventListener("click", function() {
  agregardetalles();
  vaciarCarrito();
  pintarCarrito();
});
//Add details to the order
function agregardetalles(){
var idproducto = document.getElementById('productos').value;
var cantidad = document.getElementById('cantidad').value;
var anotaciones = document.getElementById('anotaciones').value;
console.log(anotaciones)
if(anotaciones ==null){
  $.ajax({  
    url:"/detalles/"+idproducto+"/"+cantidad,
    method: 'GET',
    success: function(response) {
      $('#anotaciones').val('');
      $('#cantidad').val('');
    },
    error: function(error) {
        console.log(error);
    }
  });
}
else{
$.ajax({  
  url:"/detalles/"+idproducto+"/"+cantidad+"/"+anotaciones,
  method: 'GET',
  success: function(response) {
    $('#anotaciones').val('');
    $('#cantidad').val('');
  },
  error: function(error) {
      console.log(error);
  }
});
}

}
//Display shop cart
function pintarCarrito(){
  let textocarta = "";
  var carrito = document.getElementById("carrito");
  console.log(carrito.innerHTML);
  $.ajax({
    url:"/carrito",
    method: 'GET',
    success: function(response) {
      console.log(response)
      response.forEach(function(element) {
        textocarta+=`
        <ul class="product-list">
        <li>
          <span class="product-name">
          ${element.nombre}</span>
          -<span class="product-description">${element.descripcion}</span>
          -<span class="product-price">${element.precio}€</span>
          <span class="detalles"><a href= /formulario/${element.idproducto}>
          <svg xmlns="http://www.w3.org/2000/svg" class="text-icon" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
          <path d="M13.5 6.5l4 4" />
        </svg>
          </a></span>
          <span class="product-borrar"><a href=/borrar/${element.idproducto}>
          <svg xmlns="http://www.w3.org/2000/svg" class="text-icon" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M4 7l16 0" />
  <path d="M10 11l0 6" />
  <path d="M14 11l0 6" />
  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
</svg>
          </a></span>
        </li>
        </ul>
        </div></div>`;
      });
        $('#carrito').append(textocarta);
        console.log(carrito.innerHTML);
    },
    error: function(error) {
        console.log(error);
    }
});
}
//Clear shop cart
function vaciarCarrito(){
  $('#carrito').html('');
  
}
//Fetches and displays the categories
async function categorias(){
  let listado = "";
  let json = await bbdd("/categoriasjson");
  for (let i = 0; i < json.length; i++) {
    let categoria = json[i];
    listado+=`<ul class="product-list">
  <li>
    <span class="product-name">
    ${categoria.nombre}
    </span>
    -<span class="product-id">${categoria.idcategoria}</span>
    -<span class="product-edit">
      <a href=/categoria/${categoria.idcategoria}/editar>Editar</a>
    </span>
    -<span class="product-edit">
      <a href=/categoria/${categoria.idcategoria}/borrar>Borrar</a>
    </span>
  </li>
</ul>`;
  }
  return pintar(listado);
}
//creates an order
function crearPedido(){
  $.ajax({
    url:"/registro-pedido",
    method: 'GET',
    success: function(response) {
    },
    error: function(error) {
        console.log(error);
    }
});
}