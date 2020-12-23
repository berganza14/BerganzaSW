<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
  <script type="text/javascript" src="../js/CheckSignup.js"></script>
  <script type="text/javascript" src="../js/ConfigureSession.js"></script>
  <script type="text/javascript" src="../js/CloseSession.js"></script>


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
        <p id="userVerification" ></p>
      	Nombre y Apellidos* : <input type="text" name="nomape" id="nomape" size="80"> <br>
      	Password*: <input type="password" name="pass" id="pass"> <br>
        <p id="passVerification" ></p>
      	Repetir Password*: <input type="password" name="repass" id="repass"> <br>
        Foto* <input type="file" name="imagen" id="imagen" accept="image"><br><br>
        <input type="submit" name="boton" id="boton" value="Enviar">
        <p id="submitVerification" ></p>
      </form>


      <?php
      //include '../php/DbConfig.php';
      if (isset($_POST['email']))
       {

         $pass = $_POST["pass"];
         $repass = $_POST["repass"];
         $tipo = $_POST['tipo'];
         $email = $_POST['email'];
         $ptr_prf = "/^[a-z]+\.?[a-z]+@ehu\.(eus)|(es)$/";
         $ptr_alu = "/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$/";

         if($tipo =="" || $email == "" || $_POST['nomape']=="" || $_FILES['imagen']['size'] == 0 && $_FILES['imagen']['error'] == 0) {
           echo "Alguno de los campos esta vacio<br>";
         } else if ($tipo == 'alum' &&  preg_match( $ptr_alu, $email ) == 0) {
             echo "El correo introducido no es de alumno<br>";
         } else if ($tipo == 'prof' && preg_match( $ptr_prf, $email ) == 0 ){
             echo "El correo introducido no es de profesor<br>";
         } else if (strlen($pass) < 6 || strlen($repass) < 6 ){
            echo "Alguna de las contraseñas tiene menos de 6 caracteres.<br>";
         } else if ($pass != $repass) {
           echo "Las contraseñas no coinciden.<br>";
         } else {
            insertarNuevoUsuario();
         }
       }

         function insertarNuevoUsuario(){
          include '../php/DbConfig.php';
          $mysql = mysqli_connect($servername, $username, $password, $database);
          if (!$mysql){
             die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
           }
           echo 'Connection OK<br>';
         $pass = $_POST["pass"];
         $foto = $_FILES['imagen']['name'];
         $tipo = $_POST['tipo'];
         $email = $_POST['email'];
         $nomape = $_POST['nomape'];
   
         $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
         echo "Hash: ".$hashed_pass;

         if($_FILES['imagen']['name'] == ""){               
            $image = "../images/anonimo.jpg";
          }else{
            $image = $_FILES['imagen']['tmp_name'];             
          }
          $sql = "SELECT * FROM usuarios where email='{$email}';";
          $res = mysqli_query($mysql,$sql);
          $rowcount=mysqli_num_rows($res);
          if($rowcount != 0)
          {
             die("<h4 style=\"color: red\">Ese email ya esta registrado.</h4>");
             // <a href=\"RestorePass.php\">Restablecer constraseña</a>
          }

          $contenido_imagen = base64_encode(file_get_contents($image));
          $sql = "INSERT INTO usuarios VALUES ('$email','$nomape','$hashed_pass','$contenido_imagen','activo');";
           
          if(!mysqli_query($mysql,$sql))
          {
              die("Error: " .mysqli_error($mysql));
          }
          echo "<script>
                 alert('Registro correcto!');
                  window.location.href='LogIn.php';
                </script>";
                
            mysqli_close($mysqli);

        } 

        ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>