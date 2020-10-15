<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    	<form id="fquestion" name="fquestion" action="AddQuestion.php">
      	<br>
      	Correo*: <input type="text" name="correo" id="correo" pattern="([a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es))|([a-z]+\.?[a-z]+@ehu\.(eus)|(es))" required="true"> <br>
      	Enunciado*: <input type="text" name="enun" id="enun" minlength="10" required="true"> <br> 
      	Respuesta correcta*: <input type="text" name="resc" id="resc" required="true"> <br>
      	Respuesta incorrecta 1*: <input type="text" name="resi1" id="resi1" required="true"> <br>
      	Respuesta incorrecta 2*: <input type="text" name="resi2" id="resi2" required="true"> <br>
      	Respuesta incorrecta 3*: <input type="text" name="resi3" id="resi3" required="true"> <br>
      	Complejidad pregunta*: <br>
      	Baja <input type="radio" name="compl" value="1" id="baja">
      	Media <input type="radio" name="compl" value="2" id="media" selected="true" required="true">
      	Alta <input type="radio" name="compl" value="3" id="alta"><br>
      	Tema pregunta*: <input type="text" name="tema" required="true"> <br>
      	Imagen de pregunta (opcional)<br><br>
      	<input type="button" name="boton" id="boton" value="Enviar">
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
