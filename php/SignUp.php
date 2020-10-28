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
      <form method="POST" id="signup" name="signup" action="SignUp.php" enctype="multipart/form-data">
      	<br>
        Tipo de Usuario*: 
        Alumno <input type="radio" name="tipo" value="alum" id="alum">
        Profesor <input type="radio" name="tipo" value="prof" id="prof" checked="true"> <br>
      	Email*: <input type="text" name="email" id="email"> <br>
      	Nombre y Apellidos* : <input type="text" name="nomape" id="nomape" size="80"> <br>
      	Password*: <input type="text" name="pass" id="pass"> <br>
      	Repetir Password*: <input type="text" name="repass" id="repass"> <br>
        Foto* <input type="file" name="imagen" id="imagen" accept="image"><br><br>
        <input type="submit" name="boton" id="boton" value="Enviar">
      </form>
      <?php
      if (isset($_POST['email']))
      {
        //Validacion
        $correcto = 0;
        $error = "error";
        $pass = $_POST["pass"];
        $repass = $_POST["repass"];
        if(strlen($pass) != 0 && strlen($repass) != 0)
        {
          if($pass == $repass)
          {
            $correcto = 1;
            $error = "Las contraseñas no coinciden.";
          }
          else
          {
            $error = "Alguna de las contraseñas tiene menos de 6 caracteres.";
          }
        }
        //Añadir user a bd
        if($correcto == 1)
        {
          $mysql = mysqli_connect("localhost", "root", "", "quiz");

          if (!$mysql){
            die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
          }
          echo 'Connection OK<br>';

          $foto = $_FILES['imagen']['name'];

          $sql="INSERT INTO usuarios(usuario,email,nombre,contraseña,foto) VALUES ('$_POST[tipo]', '$_POST[email]', '$_POST[nomape]', '$_POST[pass]', '$foto')";
          if (!mysqli_query($mysql ,$sql)){
            die('Error: ' . mysqli_error($mysql));
            alert("Vaya, algo salio mal");
          }
          echo "Usuario registrado con éxito<br>";
          echo "<p> <a href='LogIn.php'> Iniciar sesión </a></p>";
        }
        else
        {
          echo $error;
        }
      }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
