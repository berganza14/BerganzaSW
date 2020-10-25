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
      $servername = "localhost";
      $username = "id14919795_sergio";
      $password = "istingorraKalea5?";
      $database = "id14919795_quiz";

    $link= mysqli_connect($servername, $username, $password, $database);
    $preguntas = mysqli_query($link, "select * from preguntas" );
    echo '<table border=1> <tr> <th> CORREO </th> <th> ENUNCIADO </th> <th> CORRECTA </th> <th> INCORRECTA 1 </th> <th> INCORRECTA 2 </th> <th> INCORRECTA 3 </th> <th> COMPLEJIDAD </th> <th> TEMA </th> <th> IMAGEN </th>
    </tr>';
    while ($row = mysqli_fetch_array( $preguntas )) {
      echo '<tr><td>' . $row['correo'] . '</td> <td>' . $row['enunciado'] . '</td> <td>' . $row['correcta'] .'</td> <td>' . $row['incorrecta1'] . '</td>
       <td>' . $row['incorrecta2'] . '</td> <td>'. $row['incorrecta3'] . '</td> <td>' . $row['complejidad'] . '</td> <td>' . $row['tema'] . '</td>
        <td>' . '<img src="data:image/jpg;base64,'.base64_encode( $row['imagen'] ).'" height="50" width="50"/>' . '</td></tr>';
    }
    echo '</table>';
    $preguntas->close();
    mysqli_close($link);
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
