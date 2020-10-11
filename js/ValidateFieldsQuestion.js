$(document).ready("#boton").click(function()
{
	alert("Enviado");
	console.log("Funciona");
	console.log("Ejecutando validacion: ");
	var correcto = true;
	var correo = $("#correo").val();
	var enun = $("#enun").val();
	var resc = $("#resc").val();
	var resi1 = $("#resi1").val();
	var resi2 = $("#resi2").val();
	var resi3 = $("#resi3").val();


	if(correo == null || enun == null || resc == null || resi1 == null || resi2 == null || resi3 == null)
	{
		correcto = false;
	}
	if(!formatoCorreo(correo))
	{
		var letras = /^[A-Za-z]+$/;
		for(var i=0;i<correo.lenght;i++)
		{
			if(i == "@" && i+1 == "i") //Estudiante
			{
				var primera1 = correo.split("@")[0];
				//Mirar si primeros elemetos son letras
				if(!correo.slice(0,i).value.match(letras))
				{
					correcto = false;
				}
				//3 primeros elementos antes de " numeros"
				if(isNaN(correo[i-1]) || isNaN(correo[i-2]) || isNaN(correo[i-3]))
				{
					correcto = false;
				}
				var ultima1 = correo.split("@")[1];
				//Despues de @
				if(ultima1 != "ikasle.ehu.eus" || ultima1 != "ikasle.ehu.es")
				{
					correcto = false;
				}
			}
			else if(i == "@" && i+1 == "e") //Profesor
			{	
				var primera2 = correo.split("@")[0];
				if(primera2.split(".").lenght == 2)
				{
					if(primera2.split(".")[0].value.match(letras) && primera2.split(".")[0].value.match(letras))
					{
						correcto = false
					}
				}
				var ultima2 = correo.split("@")[1];
				if(ultima2 != "ehu.eus" || ultima2 != "ehu.es")
				{
					correcto = false;
				}
			}
			else
			{
				console.log("Imposible");
			}
		}
	}
	if(enun.lenght > 10)
	{
		correcto = false;
	}
	return correcto;
});
