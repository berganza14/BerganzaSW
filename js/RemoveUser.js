$(document).ready(function() {
  $("#usuario").focusout(function() {
    if($('#usuario').val() == "admin@ehu.es")
    {
      $('#eliminar').attr("disabled", true);
    }
    else
    {
      $('#eliminar').attr("disabled", false);
    }
  });
  $("#eliminar").click(function(){
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
