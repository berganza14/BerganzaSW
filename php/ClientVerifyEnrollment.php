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

      //URL BUENA -> http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl
      $soapclient = new nusoap_client( 'http://localhost/nusoap-0.9.5/samples/comprobarmatricula.php?wsdl',
      true);
      //Llamamos la función que habíamos implementado en el Web Service
      //e imprimimos lo que nos devuelve
      if (isset($_POST['email']))
      {
        echo '<h1>La suma es: ' . $soapclient->call('sumar',array( 'x'=>$_POST['sumando1'],
        'y'=>$_POST['sumando2'])). '</h1>';
        echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
        echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
        echo '<h2>Debug</h2>';
      }

		  ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
