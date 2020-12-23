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
      <script>
        alert('Vuelve pronto!');
        window.location.href='DecreaseGlobalCounter.php';
        window.location.href='Layout.php';
      </script>
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
