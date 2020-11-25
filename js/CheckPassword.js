$(document).ready(function() {
  $("#pass").focusout(function() {
    console.log("Pass");
    var password = $("#pass").val();
    $.ajax({
       url : '../php/ClientVerifyPass.php?pass='+$('#pass').val(),
       type : 'GET',
       //data: { "pass": password },
       cache: false,
       async: false,
       //processData: false,
       success : function (datos)
       {
         console.log(datos);
         if(datos == "VALIDA")
         {
           $('#passVerification').html("VALIDA");
         }
         else
         {
           $('#passVerification').html("INVALIDA");
         }
       },
       error : function ()
       {
         $('#passVerification').html("ERROR");
       }
     });
    })
});
