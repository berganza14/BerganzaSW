<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      <form method="POST" id="signup" name="signup" action="LogIn.php">
      	<br>
      	Username*: <input type="text" name="user" id="user" class="valido" > <br>
        Password*: <input type="password" name="pass" id="pass" class="valido" > <br>
        <input type="submit" name="boton" id="boton" value="Log In">
      </form>
      <?php
      if (isset($_POST['user']))
      {
        $mysql = mysqli_connect("localhost", "root", "", "quiz");
        if (!$mysql){
          echo 'fallo al conectar<br>';
          die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        echo 'Connection OK<br>';

        $username = $_POST['user'];
        $pass = $_POST['pass'];

        $cont = 0;
        $usuarios = mysqli_query($mysql, "select * from usuarios where email = '$username' and contraseña = '$pass'");
        $row = mysqli_fetch_array($usuarios);
        $cont = mysqli_num_rows($usuarios);
        mysqli_free_result($usuarios);
        mysqli_close($mysql);
        $foto = $row['foto'];
        if($cont == 1)
        {
          echo ("<script> alert ('Bienvenido al sistema: '. '$username' . );</script>");
          echo ("Login correcto <p><a href='Layout.php'>Puede insertar preguntas</a>");

      ?>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>