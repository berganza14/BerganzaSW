<?php
  require_once('../lib/nusoap.php');
  require_once('../lib/class.wsdlcache.php');

  $soapclient = new nusoap_client('https://'.$_SERVER["HTTP_HOST"].'/ProyectoSW2020-Alumnos/php/VerifyPassWS.php?wsdl', true);
  
  $ticket = "1010";
  if($soapclient->getError())
  {
    echo "Error cliente";
  }
  //$_REQUEST['pass']
  $password = array('x' => "admin000",'ticket' => $ticket);

  echo $soapclient->call('verificar', $password);
  //echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
  //echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
  //echo '<h2>Debug</h2>';
  //echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
?>
