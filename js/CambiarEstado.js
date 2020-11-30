$(document).ready(function() {
  $("#cambiar").click(function(){
    $.ajax({
       url : '../php/ChangeUserState.php',
       type : 'POST',
       data: {usuario: $('#usuario').val()},
       cache: false,
       success : function (response)
       {
         console.log(response);
         $('#tabla').html(response);
       },
       error : function ()
       {
         $('#tabla').html("error");
       }
     });
  });
});
