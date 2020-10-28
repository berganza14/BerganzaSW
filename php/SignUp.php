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
      <form method="POST" id="signup" name="signup" action="SignUp.php">
      	<br>
      	Tipo de Usuario*: <input type="text" name="tipo" id="tipo" class="valido" > <br>
      	Email*: <input type="text" name="email" id="email"> <br>
      	Nombre y Apellidos* : <input type="text" name="nomape" id="nomape" size="80"> <br>
      	Password*: <input type="text" name="pass" id="pass"> <br>
      	Repetir Password*: <input type="text" name="repass" id="repass"> <br>
        <input type="file" name="imagen" id="imagen" accept="image"><br><br>
        <input type="submit" name="boton" id="boton" value="Enviar">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
