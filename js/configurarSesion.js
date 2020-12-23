    function configurarSesion(email,tipo,imagen){
    console.log("Configurando...");
    if(tipo=="admin"){
        $('#usuarios').show();
       
        
    }else{
        $('#preguntas').show();
    }
    
    $('#signup').hide();
    $('#login').hide();
    $('#logout').show();
    
    $("#h1").append("<p>"+email+"</p>");
    $("#h1").append("<img width=\"50\" height=\"60\" src=\"data:image/*;base64,"+imagen+"\"alt=\"Imagen\"/>");

    
}