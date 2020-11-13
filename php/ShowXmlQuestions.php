<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>
    table, th, td
    {
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
        $assessmentItems = simplexml_load_file( "../xml/Questions.xml" );
        echo '<table>';
        echo "<tr><th>Autor</th><th>Enunciado</th><th>Respuestas correctas</th><th>Respuestas incorrectas</th><th>Tema</th></tr>";
        foreach($assessmentItems as $assessmentItem){
            echo"<tr>";
                 echo"<td>".$assessmentItem['author']."</td>";
                 echo"<td>".$assessmentItem->itemBody->p."</td>";
                 echo"<td>".$assessmentItem->correctResponse->response."</td>";
                 $incorrectas = "";
                 foreach($assessmentItem->incorrectResponses[0] as $response)
                   {
                     $incorrectas = $incorrectas . $response . "<br>";
                   }
                 echo"<td>".$incorrectas."</td>";
                 echo"<td>".$assessmentItem['subject']."</td>";
            echo"</tr>";
       }
       echo "</table>";
       echo"<br>";
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
