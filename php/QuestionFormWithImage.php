<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <style type="text/css">
  	#placeholder
  	{
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 60%;
	}


  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="fquestion" name="fquestion" action="AddQuestion.php">
      	<br>
      	Correo*: <input type="text" name="correo" id="correo"> <br>
      	Enunciado*: <input type="text" name="enun" id="enun"> <br> 
      	Respuesta correcta* : <input type="text" name="resc" id="resc"> <br>
      	Respuesta incorrecta 1*: <input type="text" name="resi1" id="resi1"> <br>
      	Respuesta incorrecta 2*: <input type="text" name="resi2" id="resi2"> <br>
      	Respuesta incorrecta 3*: <input type="text" name="resi3" id="resi3"> <br>
      	Complejidad pregunta*: <br>
      	Baja <input type="radio" name="compE" value="Baja" id="baja">
      	Media <input type="radio" name="compE" value="Media" id="media">
      	Alta <input type="radio" name="compE" value="Alta" id="alta"><br>
      	Tema pregunta*: <input type="text" name="tema"> <br>
      	<input type="file" name="imagen" id="imagen" accept="image"><br><br>
      	<input type="button" name="boton" id="boton" value="Enviar"><br><br>
      	<img type="file" src="../images/void.png" id="placeholder">

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
