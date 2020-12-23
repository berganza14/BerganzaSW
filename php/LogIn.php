<?php
session_start ();
?>
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
      include '../php/DbConfig.php';
      if (isset($_POST['user'])) {
        $mysql = mysqli_connect($servername, $username, $password, $database);
        if (!$mysql){
          echo 'fallo al conectar<br>';
          die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        echo 'Connection OK<br>';

        $username = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM usuarios WHERE email='$username';";

        $res = mysqli_query($mysql,$sql,MYSQLI_USE_RESULT);

        if(!$res){
          die("Error: ".mysqli_error($mysql));
        }

        $row = mysqli_fetch_array($res);

        if(($row['email']==$username)and(hash_equals($row['contraseña'],crypt($pass,$row['contraseña'])))){
          if($row['estado']=="activo"){
            $_SESSION['identificado']="SI";
            $_SESSION['email']=$row['email'];
            if($row['email'] == "admin@ehu.es"){
              
              $_SESSION['tipoUser'] = "admin";
            } else {
              $_SESSION['tipoUser'] = "usuario";
            }

            echo "<script>
            alert('Bienvenido al sistema!');
            window.location.href='IncreaseGlobalCounter.php';
            </script>"; 
          } else {
            echo "Acceso denegado. Usuario bloqueado. <br>";
            echo "<a href=\"javascript:history.back()\">Volver</a>";
          }
          mysqli_close($mysql);
        }
      }
  
      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>