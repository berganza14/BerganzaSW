$(document).ready(function() {
  $("#email").focusout(function() {
    var user = $("#email").val();
    console.log("Usuario: ")
    console.log(user);
    $.ajax({
       url : '../php/ClientVerifyEnrollment.php?correo='+$('#email').val(),
       type : 'GET',
       //data: { "pass": password },
       cache: false,
       async: false,
       //processData: false,
       success : function (datos)
       {
         //console.log(datos);
         if(datos == "SI")
         {
           $('#userVerification').html("VIP");
           $('#boton').attr("disabled", false);
         }
         else
         {
           $('#userVerification').html("NO VIP");
           $('#boton').attr("disabled", true);
           $('#submitVerification').html("Tiene que ser vip para enviar el formulario");
         }
       },
       error : function ()
       {
       }
     });
    })
});
