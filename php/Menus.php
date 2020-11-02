<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"  id="signup"><a href="SignUp.php">Registro</a></span>
        <span class="right"  id="login"><a href="LogIn.php">Login</a></span>
        <span class="right" style="display:none;"  id="logout"><a href="LogOut.php">Logout</a></span>

</header>
<nav class='main' id='n1' role='navigation'>
  <?php
  if(isset($_GET['username']))
  {
    echo ("<span><a href='Layout.php?username=$_GET[username]&foto=$_GET[foto]'>Inicio</a></span>");
    echo ("<span><a href='QuestionForm.php?username=$_GET[username]&foto=$_GET[foto]'>Insertar Pregunta</a></span>");
    echo ("<span><a href='ShowQuestions.php?username=$_GET[username]&foto=$_GET[foto]'>Ver Preguntas</a></span>");
    echo ("<span><a href='Credits.php?username=$_GET[username]&foto=$_GET[foto]'>Creditos</a></span>");

    echo ("<script> document.getElementById('signup').style.display='none';</script>");
    echo ("<script> document.getElementById('login').style.display='none';</script>");
    echo ("<script> document.getElementById('logout').style.display='';</script>");
  }
  else {
    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='Credits.php'>Creditos</a></span>";
  }
  ?>
</nav>
