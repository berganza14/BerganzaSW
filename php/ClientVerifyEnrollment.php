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
      require_once('../lib/nusoap.php');
      require_once('../lib/class.wsdlcache.php');

      $soapclient = new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);

      if($soapclient->getError())
      {
        echo "Error cliente";
      }

      $user = array('x' => $_REQUEST['email']);

      echo $soapclient->call('comprobar', $user);

		  ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
