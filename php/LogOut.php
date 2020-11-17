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
      <form method="POST" id="signup" name="signup">
      	<br>
      	Username*: <input type="text" name="user" id="user" class="valido" > <br>
        Password*: <input type="text" name="pass" id="pass" class="valido" > <br>
        <input type="submit" name="boton" id="boton" value="Log In">
      </form>
      <?php
      echo ("<script> alert ('Vuelve pronto! ')</script>");

      if (headers_sent())
      {
        echo ("Ha habido un fallo de redireccionamiento, use este link");
        echo "<a href=Layout.php></a>";
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
