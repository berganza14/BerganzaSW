<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
  <style>
    .error
    {
      color: red;
      margin-left: 5px;
    }

    label.error
    {
      display: inline;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form method="GET" id="fquestion" name="fquestion" action="AddQuestion.php">
      	<br>
      	Correo*: <input type="text" name="correo" id="correo" class="valido" > <br>
      	Enunciado*: <input type="text" name="enun" id="enun" size="80"> <br>
      	Respuesta correcta* : <input type="text" name="resc" id="resc" size="80"> <br>
      	Respuesta incorrecta 1*: <input type="text" name="resi1" id="resi1" size="80"> <br>
      	Respuesta incorrecta 2*: <input type="text" name="resi2" id="resi2" size="80"> <br>
      	Respuesta incorrecta 3*: <input type="text" name="resi3" id="resi3" size="80"> <br>
      	Complejidad pregunta*: <br>
      	Baja <input type="radio" name="compl" value="1" id="baja">
      	Media <input type="radio" name="compl" value="2" id="media" checked="true">
      	Alta <input type="radio" name="compl" value="3" id="alta"><br>
      	Tema pregunta*: <input type="text" name="tema" id="tema"> <br>
      	<input type="submit" name="boton" id="boton" value="Enviar">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
