$(document).ready(function() {
  $("#enviar").click(function(){
    var myform = document.getElementById("fquestionImage");
    var fd = new FormData(myform);
    $.ajax({
       url : '../php/AddQuestionWithImage.php',
       type : 'POST',
       data: fd,
       cache: false,
       processData: false,
       contentType: false,
       success : function (response)
       {
          document.getElementById("insercionDIV").innerHTML = "Pregunta añadida!";
          pedirPreguntas();
       },
       error : function ()
       {
         document.getElementById("insercionDIV").innerHTML = "Error al añadir la pregunta :(";
       }
     });
  });
});
