<!DOCTYPE html>
<html>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function()
		{
			$("#boton").click(function()
			{
				var numero1 = parseInt($("#num1").val());
				var numero2 = parseInt($("#num2").val());
				var resultadoEsp = parseInt($("#resEsp").val());
				var operaciones = $("#ope").val();
				var resultado = null;
			    var imgNice = document.getElementsByClassName("myImg")[0];
			    if(isNaN(numero1) || isNaN(numero2) || isNaN(resultadoEsp))
				{
					$("#resObt").text(resultado + " ERROR -> Introduce numeros validos por favor");
					$("#calc").attr("src", "https://media.tenor.com/images/010338cac8b517cd03d6d3fe297144f6/tenor.gif")
				}
				else if(numero2 == 0 && operaciones == "/")
				{
					$("#resObt").text(" ERROR -> No puedes divir por 0.");
					$("#calc").attr("src", "https://i.gifer.com/8ahd.gif");
				}
				else
				{
					switch(operaciones)
					{
						case "+":
							resultado = numero1 + numero2;
							break
						case "-":
							resultado = numero1 - numero2;
							break
						case "*":
							resultado = numero1 * numero2;
							break
						case "/":
							resultado = numero1 / numero2;
							break
						default:
							console.log("El operador no es correcto");
					}
					if(resultado == resultadoEsp)
					{
						$("#resObt").text(resultado + " | El resultado es correcto :)");
						$("#calc").attr("src", "https://media4.giphy.com/media/YRuFixSNWFVcXaxpmX/giphy.gif");
					}
					else
					{
						$("#resObt").text(resultado + " | El resultado no es correcto :(");
						$("#calc").attr("src", "https://media2.giphy.com/media/3oz8xLd9DJq2l2VFtu/giphy.gif");
					}
				}
				//event.preventDefault();
				return resultado;
				});
		});
	</script>
</body>
</html> 
