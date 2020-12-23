 $(document).ready(function(){
     $('#enviar').click(function(e) {
    		var correo = $("#correo").val();
    		var enun = $("#enun").val();
    		var resc = $("#resc").val();
    		var resi1 = $("#resi1").val();
    		var resi2 = $("#resi2").val();
    		var resi3 = $("#resi3").val();
    		var dif = $('input[name=compl]:checked','#fquestion').val();
    		var tema = $("#tema").val();

        $(".error").remove();
        var error = false;

    		var ptrn = /(^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$)|(^[a-z]+\.?[a-z]+@ehu\.(eus)|(es)$)/;

        if(!correo.match(ptrn)){
          error = true;
          $('#correo').after('<span class="error">Este correo no es valido</span>');
        }
        if(enun.length <= 10){
          error = true;
          $('#enun').after('<span class="error">La pregunta tiene menos de 10 caracteres</span>');
        }
        if (resc == ""){
          error = true;
          $('#resc').after('<span class="error">La respuesta no puede estar vacia</span>');
        }
        if (resi1 == ""){
          error = true;
          $('#resi1').after('<span class="error">La respuesta no puede estar vacia</span>');
        }
        if (resi2 == ""){
          error = true;
          $('#resi2').after('<span class="error">La respuesta no puede estar vacia</span>');
        }
        if (resi3 == ""){
          error = true;
          $('#resi3').after('<span class="error">La respuesta no puede estar vacia</span>');
        }
        if (dif == ""){
          error = true;
          $('#dif').after('<span class="error">Debes de selccionar una dificultad</span>');
        }
        if (tema == ""){
          error = true;
          $('#tema').after('<span class="error">El tema no puede estar vacio</span>');
        }
        if(error)
        {
          alert("No se ha podido enviar, hay errores en el formulario.");
        }
        console.log("Error: ")
        console.log(error);
        if(error==true)
        {
          e.preventDefault();
        }
  });
  //Tuve que hacer 2 funciones para validar los formularios ya que
  //en el primero no hay el campo imagen, pero en el segundo si. Entonces
  //no podia poner la validaciond de la imagen en la primera validacion.
  $('#enviar').click(function(e) {
     var correo = $("#correo").val();
     var enun = $("#enun").val();
     var resc = $("#resc").val();
     var resi1 = $("#resi1").val();
     var resi2 = $("#resi2").val();
     var resi3 = $("#resi3").val();
     var dif = $('input[name=compl]:checked','#fquestion').val();
     var tema = $("#tema").val();

     $(".error").remove();
     var error = false;

     var ptrn = /(^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$)|(^[a-z]+\.?[a-z]+@ehu\.(eus)|(es)$)/;

     if(!correo.match(ptrn)){
       error = true;
       $('#correo').after('<span class="error">Este correo no es valido</span>');
     }
     if(enun.length <= 10){
       error = true;
       $('#enun').after('<span class="error">La pregunta tiene menos de 10 caracteres</span>');
     }
     if (resc == ""){
       error = true;
       $('#resc').after('<span class="error">La respuesta no puede estar vacia</span>');
     }
     if (resi1 == ""){
       error = true;
       $('#resi1').after('<span class="error">La respuesta no puede estar vacia</span>');
     }
     if (resi2 == ""){
       error = true;
       $('#resi2').after('<span class="error">La respuesta no puede estar vacia</span>');
     }
     if (resi3 == ""){
       error = true;
       $('#resi3').after('<span class="error">La respuesta no puede estar vacia</span>');
     }
     if (dif == ""){
       error = true;
       $('#dif').after('<span class="error">Debes de selccionar una dificultad</span>');
     }
     if (tema == ""){
       error = true;
       $('#tema').after('<span class="error">El tema no puede estar vacio</span>');
     }
     if($('#imagen').get(0).files.length === 0)
     {
       error = true;
       $('#imagen').after('<span class="error">Añade una imagen</span>');
     }
     if(error)
     {
       alert("No se ha podido enviar, hay errores en el formulario.");
     }
     console.log("Error: ")
     console.log(error);
     if(error==true)
     {
       e.preventDefault();
     }
   });
});
