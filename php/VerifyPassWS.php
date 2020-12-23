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
	if($ticket === "1010")
	{
		$handle = fopen('../txt/toppasswords.txt', 'r');
		$invalid = false;
		while (!feof($handle)) {
			$linea = fgets($handle);
			$linea = trim($linea);
			if ($linea === $x){
				$invalid = true;
			}
		}
		fclose($handle);
		if($invalid === false)
		{
			return "VALIDA";
		}
		else
		{
			return "INVALIDA";
		}
	}
	else
	{
		return "INVALIDA TICKET";
	}
}

if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server -> service($HTTP_RAW_POST_DATA);



