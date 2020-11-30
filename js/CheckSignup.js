$(document).ready(function() {
  var checkUser = false;
  var checkPass = false;
  $("#email").focusout(function() {
    var user = $("#email").val();
    console.log("Usuario: ")
    console.log(user);
    $.ajax({
       url : '../php/ClientVerifyEnrollment.php',
       type : 'POST',
       data: { correo: $("#email").val() },
       success : function (datos)
       {
         console.log("Datos");
         console.log(datos);
         if(datos == "SI")
         {
           $('#userVerification').html("VIP");
           checkUser = true;
         }
         else
         {
           $('#userVerification').html("NO VIP");
           checkUser = false;
         }
         check(checkUser, checkPass)
       },
       error : function ()
       {
         console.log("ERROR");
       }
     });
    })
    $("#pass").focusout(function() {
      var password = $("#pass").val();
      console.log(password);
      $.ajax({
         url : '../php/ClientVerifyPass.php',
         type : 'POST',
         data: { pass: $("#pass").val() },
         success : function (datos)
         {
           console.log("Datos pass: ");
           console.log(datos);
           if(datos == "VALIDA")
           {
            $('#passVerification').html("VALIDA");
            checkPass = true;
           }
           else
           {
            $('#passVerification').html("INVALIDA");
            checkPass = false;
           }
           check(checkUser, checkPass)
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
function check(checkUser, checkPass)
{
  if(checkUser && checkPass)
  {
    $('#boton').attr("disabled", false);
  }
  else
  {
    $('#boton').attr("disabled", true);
    $('#submitVerification').html("La contraseña tiene que ser valida para enviar el formulario");
  }
}
