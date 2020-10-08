<!DOCTYPE html>
<html>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function()
		{
			$("#boton").click(function()
			{
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
							if(isNaN(correo[i-1]) || isNaN(correo[i-2]) || isNaN(correo[i-3]))
							{
								correcto = false;
							}
							var ultima1 = correo.split("@")[1];
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
					}




					correcto = false;
				}
				if(enun.lenght > 10)
				{
					correcto = false;
				}
				return correcto;
			});
		});
	</script>
</body>
</html> 
