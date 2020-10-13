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
      	Correo: <input type="text" name="correo" id="correo" pattern="[a-z]*[0-9]{3}@(ikasle\.)??(ehu\.)(?:eus|es)"> <br>
      	Enunciado: <input type="text" name="enun" id="enun" minlength="10"> <br> 
      	Respuesta correcta : <input type="text" name="resc" id="resc"> <br>
      	Respuesta incorrecta 1: <input type="text" name="resi1" id="resi1"> <br>
      	Respuesta incorrecta 2: <input type="text" name="resi2" id="resi2"> <br>
      	Respuesta incorrecta 3: <input type="text" name="resi3" id="resi3"> <br>
      	Complejidad pregunta: <br>
      	Baja <input type="radio" name="compE" value="Baja" id="baja">
      	Media <input type="radio" name="compE" value="Media" id="media">
      	Alta <input type="radio" name="compE" value="Alta" id="alta"><br>
      	Tema pregunta: <input type="text" name="tema"> <br>
      	imagen de pregunta (opcional)<br><br>
      	<input type="button" name="boton" id="boton" value="Enviar">
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
