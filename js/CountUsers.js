$(document).ready(function(){  
    countUsers(); 
    setInterval(countUsers,5000);
});

function countUsers(){
    $.ajax({
        type: "GET",
        url:"../xml/UserCounter.xml",
        dataType: "xml",
        async: false,
        cache: false,
        success: function(xml){
            var numUsus = 0;
            numUsus = $(xml).find("usuario").text();        
            $('#contUsuarios').text(numUsus);    
        } 
    });
}   