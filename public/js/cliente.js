"use strict"
document.addEventListener('DOMContentLoaded', function() {
  var rutaActual = window.location.href;
  if(rutaActual == "http://127.0.0.1:8000/pedidosxcliente"){
    pedidosCliente()
  }
  if(rutaActual == "http://127.0.0.1:8000/pedidosenadmin"){
    pedidosAdmin()
  }
});
  //Load and display all the orders by user
function pedidosCliente(){
  var textocarta = "";
  $.ajax({
    url:"/pedidoscliente",
    method: 'GET',
    success: function(response) {
      response.forEach(function(element) {
      console.log(element.updated_at)
      var fecha = new Date(element.updated_at);
      var dia = fecha.getDate();
      var mes = fecha.getMonth() + 1; // Los meses van de 0 a 11, por lo que se suma 1
      var anio = fecha.getFullYear();
      var hora = fecha.getHours();
      var minutos = fecha.getMinutes();
        textocarta+="<ul class=`product-list`><li><span class=`product-name`>Estado:"+element.estado+"</span> -<span class=`product-description`>Fecha:"+dia+" "+mes+" "+anio+"</span>-<span class=`product-time`>Hora: "+hora+" h "+minutos+" min</span></li></ul></div></div>";
      });
        $('#pintar').append(textocarta);
    },
    error: function(error) {
        console.log(error);
    }
});
}
//Orders and display all orders which status are "Pendiente"
function pedidosAdmin(){
  var textocarta = "";
  $.ajax({
    url:"/pedidosadmin",
    method: 'GET',
    success: function(response) {
      response.forEach(function(element) {
      var fecha = new Date(element.updated_at);
      var dia = fecha.getDate();
      var mes = fecha.getMonth() + 1; // Los meses van de 0 a 11, por lo que se suma 1
      var anio = fecha.getFullYear();
      var hora = fecha.getHours();
      var minutos = fecha.getMinutes();
        textocarta+="<ul class=`product-list`><li><span class=`product-name`>Estado:"+element.estado+"</span> -<span class=`product-time`>Fecha:"+dia+" "+mes+" "+anio+"</span>-<span class=`product-time`>Hora: "+hora+" h "+minutos+" min</span>-<span class=`product-edit`><a href=/hecho/"+element.idpedido+">Marcar como hecho</a></span></li></ul></div></div>";
      });
      
        $('#pintar').append(textocarta);
    },
    error: function(error) {
        console.log(error);
    }
});
}
