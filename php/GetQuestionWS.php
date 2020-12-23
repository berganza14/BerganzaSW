<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$ns="http://localhost/nusoap-0.9.5/samples";
$server = new soap_server;
$server -> configureWSDL('ObtenerPregunta',$ns);

$server->wsdl->schemaTargetNamespace=$ns;

$server->register('ObtenerPregunta',array('autor'=>'xsd:string', 'enun'=>'xsd:string',
'corr'=>'xsd:string' ), array('ret'=>'xsd:string'),$ns);

function ObtenerPregunta($x)
{
	$autor = "";
	$enun = "";
	$corr = "";
	$ret = "";
	$existe = false;
	include '../php/DbConfig.php';

	$mysql = mysqli_connect ($servername, $username, $password, $database);
	if (!$link){
		echo "Error Link BD";
		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
	}
  $pregunta = mysqli_query($link, "select * from preguntas where clave='".$x."'");
	if($pregunta)
	{
		$row = mysqli_fetch_array($pregunta);
		$autor = $row['correo'];
		$enun = $row['enunciado'];
		$corr = $row['correcta'];
		$ret = $ret = "<table><tr><th>Autor</th><th>Enunciado</th><th>Respuesta correcta</th></tr>
		<tr><td>".$autor."</td><td>".$enun."</td><td>".$corr."</td></tr></table>";
	}
	return $ret;
}

if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server -> service($HTTP_RAW_POST_DATA);
?>
