function enviarForm(){

    var myform = $('#fquestionImage')[0];
    var data = new FormData(myform);

    $.ajax({
       url : '../php/AddQuestionWithImage.php',
       enctype: 'multipart/form-data',
       type : 'POST',
       data: data,
       cache: false,
       processData: false,
       contentType: false,
       success : function (data)
       {
          document.getElementById("insercionDIV").innerHTML = "Pregunta añadida!";
          $("#tabla").html(data);
       },
       error : function ()
       {
         document.getElementById("insercionDIV").innerHTML = "Error al añadir la pregunta :(";
       }
     });

} 