$(document).ready(function()
{
  refresh();
  setInterval(refresh, 5000);
});

function refresh()
{
    var cont = 0;
    var contEmail = 0;
    var email = $('#correo').val();
    $.ajax({
        type: "GET",
        url:"../xml/Questions.xml",
        dataType: "xml",
        async: false,
        cache: false,
        success: function(xml){
            $(xml).find("assessmentItem").each(function(){
            emailXml = $(this).attr('author');
            if(email.valueOf()==emailXml.valueOf()){
                contEmail += 1;
            }
                cont += 1;
        });
            $('#contPreguntas').empty();
            $('#contPreguntas').append("<a>"+contEmail+"</a> / <a>"+cont+"</a>");
    }

  });
}
