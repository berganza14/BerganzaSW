$(document).ready(function() {
  $.get('../xml/Users.xml', function(d) {
    var listacorreos = $(d).find('email');
    for (var i = 0; i < listacorreos.length; i++) {
      $('#lista').append($('<option>', {
        value: listacorreos[i].childNodes[0].nodeValue,
        text: listacorreos[i].childNodes[0].nodeValue
      }));
    }
  })
  $( "#lista" ).change(function() {
    $.get('../xml/Users.xml', function(d) {
      var email = $("#lista").val();
      var listacorreos = $(d).find('email');
      var listausuarios = $(d).find('usuario');

      for (var i = 0; i < listausuarios.length; i++) {
        var cor = listausuarios[i].childNodes[1].textContent;
          if(email == cor)
          {
            var nombre = listausuarios[i].childNodes[3].textContent;
            var ape1 = listausuarios[i].childNodes[5].textContent;
            var ape2 = listausuarios[i].childNodes[7].textContent;
            var tele = listausuarios[i].childNodes[9].textContent;
            var inf = "Nombre: " + nombre + " " + ape1 + " " + ape2 + " | Telefono: " + tele;
            $("#info").html(inf);
          }
        }
    })
  });
});





/*for (var i = 0; i < listausuarios.length; i++) {
  console.log(listausuarios[i].childNodes[1]);
  var cor = listausuarios[i].childNodes[1].textContent;
  console.log(cor);
    if(email == cor)
    {
      console.log(listausuarios[i].childNodes[3]);
      var nombre = listausuarios[i].childNodes[3].textContent;
      var ape1 = listausuarios[i].childNodes[5].textContent;
      var ape2 = listausuarios[i].childNodes[7].textContent;
      var tele = listausuarios[i].childNodes[9].textContent;
      var inf = "Nombre: " + nombre;
      $("#info").html(inf);
    }
  */
