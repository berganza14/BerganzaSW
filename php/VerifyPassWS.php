<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$ns="http://localhost/nusoap-0.9.5/samples";
$server = new soap_server;
$server -> configureWSDL('verificar',$ns);

$server->wsdl->schemaTargetNamespace=$ns;

$server->register('verificar',array('x'=>'xsd:string'),$ns);

function verificar($x){

	$handle = fopen('../txt/toppasswords.txt', 'r');
	$valid = false;
	while (($buffer = fgets($handle)) !== false) {
    	if (strpos($buffer, $x) !== false) {
        	$valid = TRUE;
        	break;
    	}
	}
	fclose($handle);
	return $valid;
}

if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server -> service($HTTP_RAW_POST_DATA);
?>
