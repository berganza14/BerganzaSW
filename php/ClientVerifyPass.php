<?php
  require_once('../lib/nusoap.php');
  require_once('../lib/class.wsdlcache.php');

  $ticket = "1010";

  $soapclient = new nusoap_client('https://'.$_SERVER["HTTP_HOST"].'/ProyectoSW2020-Alumnos/php/VerifyPassWS.php?wsdl', true);

  if($soapclient->getError())
  {
    echo "Error cliente";
  }

  $password = array('x'=>$_REQUEST['pass'],'y'=>$ticket);

  echo $soapclient->call('verificar', $password);
?>
