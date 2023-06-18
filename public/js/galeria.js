"use strict"
document.addEventListener('DOMContentLoaded', function() {
  var rutaActual = window.location.href;
  if(rutaActual == "http://127.0.0.1:8000/galeria" || rutaActual == "http://127.0.0.1:8000/galeriacliente"){
    cargarImagenes()
  }
});
//Load the images and display them
function cargarImagenes(){
  let texto = "<div id=galeria>";
  $.ajax({
    url:"/cargarImagenes",
    method: 'GET',
    success: function(response) {
      response.forEach(function(element) {
        if(element.imagen != null){
          console.log(element.nombre)
          texto += "<div id='imagen-container'>";
          texto += "<img id =imagen src="+element.imagen+" alt='"+element.nombre+"'>";
          texto += "<div id='alt'>" + element.nombre + "</div>";
          texto += "</div>";
          console.log(texto)
        }
      });
      texto+="</div>";
        $('#pintar').append(texto);
    },
    error: function(error) {
        console.log(error);
    }
});
}