<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/configurarSesion.js"></script>
<script type="text/javascript" src="../js/cerrarSesion.js"></script>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"  id="signup"><a href="SignUp.php">Registro</a></span>
  <span class="right" id="login" ><a href="LogIn.php">Login</a></span>
  <span class="right" style="display:none" id="logout"><a href="LogOut.php">LogOut</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
    <span id="usuarios" style="display:none"><a href='HandlingAccounts.php'> Gestionar Usuarios</a></span>
    <span id="preguntas" style="display:none"><a href='HandlingQuizesAjax.php'> Gestionar Preguntas</a></span>
    <span><a href='Credits.php'>Creditos</a></span>
</nav>

<?php
    //falta que el bloqueado no le deje entrar
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $imagen = cargarImagenDeBD();
        echo "<script>console.log('Iniciando sesión...');</script>";
        echo "<script>configurarSesion('".addslashes($email)."','".addslashes($_SESSION['tipoUser'])."','".addslashes($imagen)."');</script>";
  
    }else{

        echo "<script>cerrarSesion();</script>";
    }
    
    function cargarImagenDeBD(){
        include 'DbConfig.php';
        $mysql = mysqli_connect($servername,$username,$password,$database);
        if(!$mysql){
            die("Error: ".mysqli_connect_error);
        }

        $sql = "SELECT foto FROM usuarios WHERE email=\"".$_SESSION['email']."\";";
        $res = mysqli_query($mysql,$sql, MYSQLI_USE_RESULT);
        if(!$res){
            die("Error: ".mysqli_error($mysql));
        }
        $img = mysqli_fetch_array($res);

        mysqli_close($mysql);
        return $img['foto'];
    }
?>
