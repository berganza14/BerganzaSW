<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      Añadir el formulario y los scripts necesarios para que el usuario <br>
      pueda introducir los datos de una pregunta sin imagen.


      <form id="fquestion" name="fquestion" action="AddQuestion.php">
      	<br>
      	Correo: <input type="text" name="correo"> <br>
      	Enunciado: <input type="text" name="enun"> <br> 
      	Respuesta corr1: <input type="text" name="resc"> <br>
      	Respuesta incorr1: <input type="text" name="resi1"> <br>
      	Respuesta incorr1: <input type="text" name="resi2"> <br>
      	Respuesta incorr1: <input type="text" name="resi3"> <br>
      	Complejidad pregunta: <br>
      	Baja <input type="radio" name="compE" value="Baja">
      	Media <input type="radio" name="compE" value="Media">
      	Alta <input type="radio" name="compE" value="Alta"><br>
      	Tema pregunta: <input type="text" name="tema"> <br>
      	imagen de pregunta (opcional)<br><br>
      	<input type="button" name="boton" id="boton" value="Enviar">




      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
