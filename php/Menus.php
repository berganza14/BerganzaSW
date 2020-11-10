<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"  id="signup"><a href="SignUp.php">Registro</a></span>
        <span class="right" id="login"><a href="LogIn.php">Login</a></span>
        <span class="right" style="display:none;"  id="logout"><a href="LogOut.php">LogOut</a></span>
          <?php
          if(isset($_GET['username']))
          {
            echo '<span class="right" id="user">'.$_GET['username'].'</span>';
            //echo '<img src='.$_GET['foto'].' height="50" width="50"/>';
            //echo '<img src="data:image/jpg;base64,'.base64_encode( $_GET['foto'] ).'" height="50" width="50"/>';
          }
          ?>

</header>
<nav class='main' id='n1' role='navigation'>
  <?php
  if(isset($_GET['username']))
  {
    echo ("<span><a href='Layout.php?username=$_GET[username]'>Inicio</a></span>");
    echo ("<span><a href='QuestionFormWithImage.php?username=$_GET[username]'>Insertar Pregunta</a></span>");
    echo ("<span><a href='ShowQuestionsWithImage.php?username=$_GET[username]'>Ver Preguntas</a></span>");
    echo ("<span><a href='ShowXmlQuestions.php?username=$_GET[username]'>Ver Preguntas xml</a></span>");

    echo ("<span><a href='Credits.php?username=$_GET[username]'>Creditos</a></span>");
    echo ("<script> document.getElementById('signup').style.display='none';</script>");
    echo ("<script> document.getElementById('login').style.display='none';</script>");
    echo ("<script> document.getElementById('logout').style.display='';</script>");
    //echo ("<script> document.getElementById('user').innerHTML=".strval(htmlspecialchars($_GET['username']))).";</script>");
    //echo ("<script> document.getElementById('user').style.display='';</script>");
  }
  else {
    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='Credits.php'>Creditos</a></span>";
  }
  if(isset($_REQUEST['username']))
  {
    $logInMail = $_REQUEST['username'];
    echo "<span id='inicio'><a id='ini' href='Layout.php?logInMail=$logInMail'>Inicio</a></span>";
    echo "<span id='insertar'><a id='ins' href='QuestionFormWithImage.php?logInMail=$logInMail'>Insertar pregunta</a></span>";
    echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php?logInMail=$logInMail'>Ver Preguntas</a> </span>";
    echo "<span id='creditos'> <a id='cre' href='Credits.php?logInMail=$logInMail'> Creditos </a> </span>";
    echo "<script> $(\"#h1\").append(\"<p>$logInMail</p>\"); </script>";
    //echo "<script> $(\"#h1\").append(\"<img/>\");";
    echo "<script> showOnLogIn(); </script>";
  }
  else
  {
    echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
    echo "<span id='insertar'><a id='ins' href='QuestionFormWithImage.php'>Insertar pregunta</a></span>";
    echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
    echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php'> Ver preguntas BD </a> </span>";
    echo "<script> showOnNotLogIn(); </script>";
  }

function getImagenDeBD(){
  $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
  if(!$mysqli){
      die("Error: ".mysqli_connect_error);
      echo "<span><a href='javascript:history.back()'>Volver</a></span>";
  }
  $sql = "SELECT imagen FROM usuarios WHERE email=\"".$logInMail."\";";
  $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
  if(!$resul){
      die("Error: ".mysqli_error($mysqli));
      echo "<span><a href='javascript:history.back()'>Volver</a></span>";
  }
  $img = mysqli_fetch_array($resul);
  return $img['imagen'];
  ?>
</nav>
