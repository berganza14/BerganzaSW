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

      $link = mysqli_connect ("localhost", "root", "", "quiz");
      //$link= mysqli_connect($servername, $username, $password, $database);

      if (!$link){
        die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
      }
      echo 'Connection OK<br>';

      $required = array('correo','enun','resc','resi1','resi2','resi3','compl','tema');
      $error = 0;

      foreach($required as $field)
      {
        if ($_POST[$field] == "")
        {
          echo $_POST[$field];
          $error = 1;
        }
      }

      $ptrn = '/(^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)$)|(^[a-z]+\.?[a-z]+@ehu\.(eus)|(es)$)/';
      $correo = $_POST["correo"];
      echo $correo;
      if(preg_match($ptrn, $correo) == 0)
      {
        echo "hola";
        $error = 1;
      }

      if($error == 0)
      {
        $image_temporal = $_FILES['imagen']['tmp_name'];
        $imagen = addslashes(file_get_contents($image_temporal));

        $sql="INSERT INTO preguntas(correo,enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema,imagen) VALUES ('$_POST[correo]', '$_POST[enun]', '$_POST[resc]', '$_POST[resi1]', '$_POST[resi2]', '$_POST[resi3]', '$_POST[compl]', '$_POST[tema]', '$imagen')";
        if (!mysqli_query($link ,$sql))
        {
          die('Error: ' . mysqli_error($link));
          alert("Vaya, algo salio mal");
        }
        echo "Pregunta añadida con éxito<br>";
        echo "<p> <a href='ShowQuestionsWithImage.php?username=$correo'> Ver registros </a></p>";

        $xml = simplexml_load_file("..\xml\Questions.xml");
        if(!$xml)
        {
          echo("<script> alert ('Error')</script>");
        }
        else
        {
          echo("<script> alert ('Funcionando')</script>");
          $pregunta = $xml->addChild('assessmentItem');
          $pregunta->addAttribute('subject', $_POST['tema']);
          $pregunta->addAttribute('author', $_POST['correo']);

          $itemBody = $pregunta->addChild("itemBody");
          $itemBody->addChild('p', $_POST['enun']);
          $correctResponses = $pregunta->addChild("correctResponse");
          $correctResponses->addChild("response", $_POST['resc']);

          $incorrectResponses = $pregunta->addChild("incorrectResponses");
          $incorrectResponses->addChild("response", $_POST['resi1']);
          $incorrectResponses->addChild("response", $_POST['resi2']);
          $incorrectResponses->addChild("response", $_POST['resi3']);

          $xml->asXML('..\xml\Questions.xml');
        }
      }
      else
      {
        echo "Error de validacion del formulario<br>";
        echo "<p> <a href='QuestionFormWithImage.php?username=$correo> Volver a intentar. </a></p>";
      }

      mysqli_close($link);
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
