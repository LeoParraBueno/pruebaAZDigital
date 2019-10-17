<?php
include("AZDigitalSOAPClient.php");

$AZDigitalCliente = new AZDigitalSOAPClient;

$parametros = array("Condiciones" => array("Condicion" => array("Tipo" => "FechaInicial", "Expresion" => "2019-07-01 00:00:00")));
//var_dump($AZDigitalCliente->buscarArchivo($parametros));
$archivos = $AZDigitalCliente->buscarArchivos($parametros);
//print_r($archivos);

$AZDigitalCliente->guardarArchivosenBD($archivos);
?>
<!doctype html>
<html>
<head>
    <title>PRUEBA TÉCNICA DE LEOPARRABUENO</title>
</head>
<body>
    <button><a href = "reporte1.php">ARCHIVOS SOAP WEB SERVICE</a></button> <br><br>
    <button><a href = "reporte2.php">CANTIDAD DE ARCHIVOS POR EXTENSIÓN</a></button>
</body>
</html>