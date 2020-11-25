<?php
  require_once('../lib/nusoap.php');
  require_once('../lib/class.wsdlcache.php');

  $soapclient = new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);

  if($soapclient->getError())
  {
    echo "Error cliente";
  }

  $user = array('x' => $_REQUEST['correo']);

  echo $soapclient->call('comprobar', $user);

?>
