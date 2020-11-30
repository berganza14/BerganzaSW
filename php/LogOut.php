<?php
session_start();
session_destroy();
?>
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
      <?php
      echo ("<script> alert ('Vuelve pronto! ')</script>");

      if (headers_sent())
      {

        echo ("Ha habido un fallo de redireccionamiento, use este link");
        echo("<p><a href='LogIn.php'</a>Log In</p>");
      }
      else
      {
          header('location: Layout.php');
      }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
