 $(document).ready(function(){
      $("#boton").click(function() {

		var correo = $("#correo").val();
		console.log(correo);
		var enun = $("#enun").val();
		var resc = $("#resc").val();
		var resi1 = $("#resi1").val();
		var resi2 = $("#resi2").val();
		var resi3 = $("#resi3").val();

		var ptrn = /^\w[0-9]{3}@(ikasle\.)?ehu\.(eus)|(es)$/g;
		var ptrnAlu = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$/;
		var ptrnProf = /^[a-z]*\.?[a-z]*@ehu\.(eus)|(es)$/;

		if(correo.match(ptrnAlu) || correo.match(ptrnProf)){
			console.log("Alumno o profe");
			return true;

		}
		else{
			console.log("Email no valido")
			return false;

		}

  });

});