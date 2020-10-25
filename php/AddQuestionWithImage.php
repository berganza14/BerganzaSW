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

      if (!$link){
        die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
      }
      echo 'Connection OK<br>';

      $image_temporal =$_FILES['imagen']['tmp_name'];
      $imagen = addslashes(file_get_contents($image_temporal));

      $sql="INSERT INTO preguntas(correo,enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema,imagen) VALUES ('$_POST[correo]', '$_POST[enun]', '$_POST[resc]', '$_POST[resi1]', '$_POST[resi2]', '$_POST[resi3]', '$_POST[compl]', '$_POST[tema]', '$imagen')";
      if (!mysqli_query($link ,$sql)){
        die('Error: ' . mysqli_error($link));
        alert("Vaya, algo salio mal");
      }
      echo "Pregunta añadida con éxito<br>";
      echo "<p> <a href='ShowQuestionsWithImage.php'> Ver registros </a></p>";
      // Cerrar conexión
      mysqli_close($link);
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
