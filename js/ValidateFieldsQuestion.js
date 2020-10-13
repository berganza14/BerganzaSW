 $(document).ready(function(){
      $("#boton").click(function() {

		var correo = $("#correo").val();
		console.log(correo);
		var enun = $("#enun").val();
		var resc = $("#resc").val();
		var resi1 = $("#resi1").val();
		var resi2 = $("#resi2").val();
		var resi3 = $("#resi3").val();
		var dif = $('input[name=compl]:checked','#fquestion').val();
		
		var tema = $("#tema").val();
		console.log(dif);
		console.log(tema)


		var email = true;
		var pregu = true;
		var ptrnAlu = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$/;
		var ptrnProf = /^[a-z]*\.?[a-z]*@ehu\.(eus)|(es)$/;

		if(correo.match(ptrnAlu) || correo.match(ptrnProf)){
			console.log("Alumno o profe");
			email = true;

		}
		else{
			console.log("Email no valido")
			alert("Email no válido")
			email = false;
		}

		if(enun.length <= 10){
			console.log("Pregunta corta");
			alert("La pregunta tiene que tener más de 10 caracteres");
		}
		if (resi1 == "" || resi2 == "" || resi3 == ""){
			console.log("Alguna respuesta vacía");
			alert("No puede haber respuestas vacías");
		}
		if (dif == ""){
			console.log("Dificultad vacía");
			alert("Elige una dificultad para la pregunta");
		}
		if (tema == ""){
			console.log("Tema vacío");
			alert("Introduce un tema para la pregunta");
		}

  });

});