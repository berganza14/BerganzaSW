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

			$link = mysqli_connect ("localhost", "root", "", "quiz");
			if (!$link){
				die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
			}
			echo 'Connection OK<br>';
			$sql="INSERT INTO preguntas(correo,enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema) VALUES ('$_GET[correo]', '$_GET[enun]', '$_GET[resc]', '$_GET[resi1]', '$_GET[resi2]', '$_GET[resi3]', '$_GET[compl]', '$_GET[tema]')";
			if (!mysqli_query($link ,$sql)){
				die('Error: ' . mysqli_error($link));
				alert("Vaya, algo salio mal");
			}
			echo "Pregunta añadida con éxito<br>";
			echo "<p> <a href='ShowQuestions.php'> Ver registros </a></p>";
			// Cerrar conexión
			mysqli_close($link);
		?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
