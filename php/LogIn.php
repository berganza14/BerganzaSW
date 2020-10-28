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
      	Username*: <input type="text" name="user" id="user" class="valido" > <br>
        Password*: <input type="text" name="pass" id="pass" class="valido" > <br>
        <input type="submit" name="boton" id="boton" value="Log In">
      </form>
      <?php
      if (isset($_POST['email']))
      {
        $mysql = mysqli_connect("localhost", "root", "", "quiz");
        if (!$mysql){
          die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        echo 'Connection OK<br>';

        $usuarios = mysqli_query($mysql, "select * from users where user_email = '$username' and user_password = '$pass'");
        $cont = mysqli_num_rows($usuarios);
        mysqli_close($mysql);
        if($cont == 1)
        {
          echo ("<script> alert ('Bienvenido al sistema: '. '$username' . )</script>");
          echo ("Login correcto <p><a href='Layout.php'>Puede insertar preguntas</a>");
        }
        else
        {
          echo ("Parametros de login incorrectos");
        }
      }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
