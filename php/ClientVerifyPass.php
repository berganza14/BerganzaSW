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
      //CLIENTE

      //incluimos la clase nusoap.php
      require_once('../lib/nusoap.php');
      require_once('../lib/class.wsdlcache.php');
      //creamos el objeto de tipo soapclient.
      //http://www.mydomain.com/server.php se refiere a la url
      //donde se encuentra el servicio SOAP que vamos a utilizar.

      $password = $_POST['pass'];
      //URL BUENA -> http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl
      $soapclient = new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);

      $resultado = $soapclient->call('verificar',array('x'=>$password,'y'=>"1010"));

      //$resultado = "password";
      //echo "<script> alert(".$resultado.")</script>";
      echo $resultado;

		  ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
