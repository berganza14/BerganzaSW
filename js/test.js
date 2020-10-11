 $(document).ready(function(){
      $("#boton").click(function() {
      	console.log("Dentro del test");
      	validate();
      	});
  });

function validate()
{
	console.log("Ejecutando validacion: ");
	var correcto = true;
	var correo = $("#correo").val();
	console.log(correo);
	var enun = $("#enun").val();
	var resc = $("#resc").val();
	var resi1 = $("#resi1").val();
	var resi2 = $("#resi2").val();
	var resi3 = $("#resi3").val();

	//	if(correo == "" || enun == "" || resc == "" || resi1 == "" || resi2 == "" || resi3 == "")

	if(correo == "" || enun == "")
	{
		correcto = false;
		console.log("Algun elemento es vacio");
	}
	var letras = /^[A-Za-z]+$/;
	console.log(correo.length);
	for (var i=0;i<correo.lenght;i++)
	{
		console.log(i);
		console.log("iteracion");
		if(correo.charAt(i) == "@" && orreo.charAt(i+1) == "i") //Estudiante xxx@ikasle
		{
			console.log("Correo de estudiante");
			var primera1 = correo.split("@")[0];
			//Mirar si primeros elemetos son letras
			if(!correo.slice(0,i).value.match(letras))
			{
				console.log("Los primeros elemetos no son letras");
				correcto = false;
			}
			//3 primeros elementos antes de " numeros"
			if(isNaN(correo.charAt(i-1)) || isNaN(correo.charAt(i-2)) || isNaN(correo.charAt(i-3)))
			{
				console.log("Los 3 elemtos antes de @ no son numeros");
				correcto = false;
			}
			var ultima1 = correo.split("@")[1];
			//Despues de @
			if(ultima1 != "ikasle.ehu.eus" || ultima1 != "ikasle.ehu.es")
			{
				console.log("Despues de @ incorrecto");
				correcto = false;
			}
		}
		else if(correo.charAt(i) == "@" && correo.charAt(i+1) == "e") //Profesor xxx@ehu
		{	
			console.log("Correo de profesor");
			//Se coge la primera parte del correo 1@2
			var primera2 = correo.split("@")[0];
			if(primera2.split(".").lenght == 2)
			{
				//Dos opciones, que sean todo letras o que haya un punto
				//Si hay punto se mira si hay letras a los dos lados
				if(primera2.split(".")[0].value.match(letras) && primera2.split(".")[0].value.match(letras))
				{
					console.log("Antes de @ incorrecto");
					correcto = false
				}
			}
			//Despues de la @ correo valido
			var ultima2 = correo.split("@")[1];
			if(ultima2 != "ehu.eus" || ultima2 != "ehu.es")
			{
				console.log("Despues de @ incorrecto");
				correcto = false;
			}
		}
		else
		{
			console.log("Imposible");
			correcto = false;
		}
	}
	//Enunciado tiene que ser menor de 10
	if(enun.lenght > 10)
	{
		console.log("Enunciado demasiado corto");
		correcto = false;
	}
	console.log("La validacion es: ")
	console.log(correcto)
	return correcto;
}