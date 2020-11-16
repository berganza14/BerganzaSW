<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <script type="text/javascript" src="../js/AddQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/CountQuestions.js"></script>
  <style type="text/css">
    .error
    {
      color: red;
      margin-left: 5px;
    }

    label.error
    {
      display: inline;
    }
    table, th, td
    {
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="counter">
      <p id="counter2">
      </p>
    </div>
    <div>
      <form id="fquestionImage" name="fquestionImage" method="POST" action="<?php echo 'AddQuestionWithImage.php?username=$_GET[username]&foto=$_GET[foto]'; ?>" enctype="multipart/form-data">
      	<br>
        Correo*: <input type='text' name='correo' id='correo' value="<?php echo htmlspecialchars($_GET["username"])?>"> <br>
      	Enunciado*: <input type="text" name="enun" id="enun"> <br>
      	Respuesta correcta* : <input type="text" name="resc" id="resc"> <br>
      	Respuesta incorrecta 1*: <input type="text" name="resi1" id="resi1"> <br>
      	Respuesta incorrecta 2*: <input type="text" name="resi2" id="resi2"> <br>
      	Respuesta incorrecta 3*: <input type="text" name="resi3" id="resi3"> <br>
      	Complejidad pregunta*: <br>
        Baja <input type="radio" name="compl" value="1" id="baja">
      	Media <input type="radio" name="compl" value="2" id="media" checked="true">
      	Alta <input type="radio" name="compl" value="3" id="alta"><br>
      	Tema pregunta*: <input type="text" name="tema" id="tema"> <br>
        <input type="file" name="imagen" id="imagen" accept="image"><br><br>
        <input type="button" name="enviar" id="enviar" value="Enviar Pregunta"><br><br>
        <input type="button" name="ver" id="ver" value="Ver Preguntas" onclick="pedirPreguntas()"><br><br>
      </form>
    </div>
    <div id="insercionDIV">
      <p>
      </p>
    </div id="preguntasDIV">
    <div>
      <table id="preguntas" >
      </table>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
