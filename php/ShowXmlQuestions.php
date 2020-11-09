<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
      $xml = simplexml_load_file('..\xml\Questions.xml');
      echo '<table border=1> <tr> <th> ENUNCIADO </th> <th> CORRECTA </th> <th> INCORRECTA 1 </th> <th> INCORRECTA 2 </th> <th> INCORRECTA 3 </th> <th> TEMA </th></tr>';
      foreach ($xml->assessmentItem as $pregunta)
      {
        echo '<tr><td>' . $pregunta->itemBody->p . '</td> <td>' . $pregunta->correctResponse->response .'</td> <td>' . $pregunta->incorrectResponses->response[0] . '</td>
         <td>' . $pregunta->incorrectResponses->response[1] . '</td> <td>'. $pregunta->incorrectResponses->response[2]. '</td> <td>' . $pregunta['subject'] . '</td></tr>';
      }
		  ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
