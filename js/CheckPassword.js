$(document).ready(function() {
  $("#pass").focusout(function() {
    var password = $("#pass").val();
    console.log(password);
    $.ajax({
       url : '../php/ClientVerifyPass.php',
       type : 'POST',
       data: { "pass": password },
       cache: false,
       processData: false,
       contentType: false,
       success : function (datos)
       {
         alert(datos);
       },
       error : function ()
       {
       }
     });
    })
});
