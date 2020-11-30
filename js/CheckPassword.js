$(document).ready(function() {
  $("#pass").focusout(function() {
    var password = $("#pass").val();
    console.log(password);
    $.ajax({
       url : '../php/ClientVerifyPass.php?pass='+$('#pass').val(),
       type : 'GET',
       //data: { "pass": password },
       cache: false,
       async: false,
       //processData: false,
       success : function (datos)
       {
         console.log("Datos pass: ");
         console.log(datos);
         if(datos == "VALIDA")
         {
           $('#passVerification').html("VALIDA");
           $('#boton').attr("disabled", false);
         }
         else
         {
           $('#passVerification').html("INVALIDA");
           $('#boton').attr("disabled", true);
           $('#submitVerification').html("La contraseña tiene que ser valida para enviar el formulario");
         }
       },
       error : function ()
       {
         console.log("Datos error: ");
         console.log(datos);
         $('#passVerification').html("ERROR");
       }
     });
    })
});
