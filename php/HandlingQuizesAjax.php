<?php include'../php/Seguridad.php'?>
<?php
    if($_SESSION['tipoUser']!="usuario"){
        header('location:Layout.php');
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <script type="text/javascript" src="../js/AddQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/CountQuestions.js"></script>
  <script type="text/javascript" src="../js/CountUsers.js"></script>
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
    <div id="info">
      <h4>Preguntas: </h4>
      <h4 id="contPreguntas"></h4><br>
      <h4>Usuarios: </h4>
      <h4 id="contUsuarios"></h4><br>
    </div>
    <div>
      <form id="fquestionImage" name="fquestionImage" method="POST" enctype="multipart/form-data">
      	<br>
        Correo*: <input type='text' name='correo' id='correo' value="<?php echo $_SESSION['email'];?>" disabled> <br>
      	Enunciado*: <input type="text" name="enun" id="enun" required> <br>
      	Respuesta correcta* : <input type="text" name="resc" id="resc" required> <br>
      	Respuesta incorrecta 1*: <input type="text" name="resi1" id="resi1" required> <br>
      	Respuesta incorrecta 2*: <input type="text" name="resi2" id="resi2" required> <br>
      	Respuesta incorrecta 3*: <input type="text" name="resi3" id="resi3" required> <br>
      	Complejidad pregunta*: <br>
        Baja <input type="radio" name="compl" value="1" id="baja">
      	Media <input type="radio" name="compl" value="2" id="media" checked="true">
      	Alta <input type="radio" name="compl" value="3" id="alta"><br>
      	Tema pregunta*: <input type="text" name="tema" id="tema" required> <br>
        <input type="file" name="imagen" id="imagen" accept="image"><br><br>
        <div class="newImagen"></div> <br><br>
        <input type="button" name="submit" id="submit" value="Enviar Pregunta" onclick="enviarForm()"><br><br>
        <input type="button" name="ver" id="ver" value="Ver Preguntas" onclick="verPreguntas()"><br><br>
      </form>
    </div>
    <div id="insercionDIV">
    </div>
    <div id="tabla">
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
