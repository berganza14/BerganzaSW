<?php include'../php/Seguridad.php'?>
<?php
    if($_SESSION['tipoUser']!="usuario"){
        header('location:Layout.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <section class="main" id="s1">
    <div>
        <?php
        include '../php/DbConfig.php';

        $link = mysqli_connect ($servername, $username, $password, $database);

        if (!$link){
          echo "Error Link BD";
          die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        echo 'Connection OK<br>';
      
        $email = strip_tags($_SESSION['email']);
        $enunciado = strip_tags($_REQUEST['enun']);
        $respuestac = strip_tags($_REQUEST['resc']);
        $respuestai1 = strip_tags($_REQUEST['resi1']);
        $respuestai2 = strip_tags($_REQUEST['resi2']);
        $respuestai3 = strip_tags($_REQUEST['resi3']);
        $complejidad = strip_tags($_REQUEST['compl']);
        $tema = ($_REQUEST['tema']);

        if($_FILES['imagen']['name'] == ""){
            $contenido_imagen = base64_encode("");
        } else {
            $image = $_FILES['imagen']['tmp_name'];
            $contenido_imagen = base64_encode(file_get_contents($image));
        }

        $sql = "INSERT INTO preguntas(correo, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, complejidad, tema, imagen) VALUES('$email', '$enunciado', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', $complejidad, '$tema', '$contenido_imagen')";


        if(!mysqli_query($link,$sql))
        {
            die("Error: " .mysqli_error($link));
        }
        echo "Registro añadido en la base de datos.<br>";
        mysqli_close($link);


        //XML
        if(file_exists('../xml/Questions.xml')){
              echo("<script> console.log('Añadiendo al XML...')</script>");
          
              $xml = simplexml_load_file('../xml/Questions.xml');

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
            
              $xml->asXML('../xml/Questions.xml') or die("Error al guardar el fichero Questions.xml");
              echo "Registro añadido en XML.<br>";
            }else{
                  exit("No se ha podido guardar en XML, no se encuentra el fichero Questions.xml");
            }
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
