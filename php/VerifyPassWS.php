<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$ns="http://".$_SERVER['HTTP_HOST']."/ProyectoSW2020-Alumnos/php";
$server = new soap_server;
$server -> configureWSDL('verificar',$ns);

$server->wsdl->schemaTargetNamespace=$ns;

$server->register('verificar',
		array('x'=>'xsd:string', 'ticket'=>'xsd:string'),
		array('y'=>'xsd:string'),$ns);

function verificar($x,$ticket)
{
	$ret = "INVALIDA";
	if($ticket == "1010")
	{
		$handle = fopen('../txt/toppasswords.txt', 'r');
		$valid = true;
		/*while (($buffer = fgets($handle)) !== false) {
				if (strpos($buffer, $x) !== false) {
						$valid = TRUE;
						break;
				}
		}*/
		while(!feof($handle))
		{
			$linea = fgets($handle);
			$linea = trim($linea);
			if($linea == $x)
			{
				$valid = false;
			}
		}
		fclose($handle);
		if($valid)
		{
			$ret = "VALIDA";
		}
	}
	return $ret;
}

if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server -> service($HTTP_RAW_POST_DATA);
?>
