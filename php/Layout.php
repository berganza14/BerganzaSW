<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>
         #s1 {
          background-image: url("../images/quiz.jpg");
          background-position: center; /* Center the image */
          background-repeat: no-repeat; /* Do not repeat the image */
          background-size: auto; /* Resize the background image to cover the entire container */
          /*background-image: linear-gradient(red, yellow);*/
         }
         h2 {
          color: darkblue;
          -webkit-text-stroke: 1px white;
         }
      </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div id = "div_quiz">

      <h2>Quiz: el juego de las preguntas</h2>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
