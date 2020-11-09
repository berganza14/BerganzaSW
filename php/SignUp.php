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
      	Password*: <input type="password" name="pass" id="pass"> <br>
      	Repetir Password*: <input type="password" name="repass" id="repass"> <br>
        Foto* <input type="file" name="imagen" id="imagen" accept="image"><br><br>
        <input type="submit" name="boton" id="boton" value="Enviar">
      </form>
      <?php
      $servername = "localhost";
      $username = "id14919795_sergio";
      $password = "istingorraKalea5?";
      $database = "id14919795_quiz";
      if (isset($_POST['email']))
       {
         //Validacion del email
         $error = "error";
         $correcto = 1;
         $tipo = $_POST['tipo'];
         $email = $_POST['email'];
         $ptr_prf = "/^[a-z]+\.?[a-z]+@ehu\.(eus)|(es)$/";
         $ptr_alu = "/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$/";
         if($tipo =="" || $email == "" || $_POST['nomape']=="" || $_FILES['imagen']['size'] == 0 && $_FILES['imagen']['error'] == 0)
         {
           $error = "Alguno de los campos esta vacio";
           $correcto = 0;
         }
         if ($tipo == 'alum') {
           if ( preg_match( $ptr_alu, $email ) == 0 ) {
             $error = "El correo introducido no es de alumno";
             $correcto = 0;
           }
         } else {
           if ( preg_match( $ptr_prf, $email ) == 0 ) {
             $error = "El correo introducido no es de profesor";
             $correcto = 0;
           }
         }

         //Verificacion contraseña
         $pass = $_POST["pass"];
         $repass = $_POST["repass"];
         if((strlen($pass) < 6 || strlen($repass) < 6 ))
         {
           $error = "Alguna de las contraseñas tiene menos de 6 caracteres.";
           $correcto = 0;

         } else if ($pass != $repass) {
           $error = "Las contraseñas no coinciden.";
           $correcto = 0;

         } else {
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

           $sql="INSERT INTO usuarios(tipo,email,nombre,contraseña,foto) VALUES ('$_POST[tipo]', '$_POST[email]', '$_POST[nomape]', '$_POST[pass]', '$foto')";
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
