$(document).ready(function() {
  $("#eliminar").click(function(){
    console.log("eliminando");
    $.ajax({
       url : '../php/RemoveUser.php',
       type : 'POST',
       data: {usuario: $('#usuario').val()},
       cache: false,
       success : function (response)
       {
         $('#tabla').html(response);
       },
       error : function ()
       {
         $('#tabla').html("error");
       }
     });
  });
});
