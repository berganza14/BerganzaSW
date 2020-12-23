function verPreguntas(){
    $.ajax({
        url: '../php/ShowXmlQuestions.php',
        success:function(datos){
           $('#tabla').append(datos);
        },
        error:function(){
            $('#insercionDIV').html('<p>Error ShowQuestionsAjax</p>');
        }
    });
}