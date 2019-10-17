<?php
include("DBCON.php");

$db = new baseDatos();

$con = $db->conectarDB();
$infoRepo1 = $db->mostrarReporte1($con);
$db->desconectarDB ($con);

?>

<!doctype html>
<html>
<head>
    <title>REPORTE 1 LEOPARRABUENO</title>
</head>
<body>
    <h1>ARCHIVOS SOAP WEB SERVICE</h1>
    <table border = "1">
        <thead>
            <tr>
                <th>ID del Archivo</th>
                <th>Nombre</th>
                <th>Tipo de Archivo</th>
                <th>Extensión</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $infoRepo1;?>
        </tbody>
    </table>
</body>
</html>