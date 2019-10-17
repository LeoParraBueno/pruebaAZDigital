<?php
include("DBCON.php");

$db = new baseDatos();

$con = $db->conectarDB();
$infoRepo2 = $db->mostrarReporte2($con);
$db->desconectarDB ($con);

?>

<!doctype html>
<html>
<head>
    <title>REPORTE 2 LEOPARRABUENO</title>
</head>
<body>
    <h1>CANTIDAD DE ARCHIVOS POR EXTENSIÓN</h1>
    <table border = "1">
        <thead>
            <tr>
                <th>Extensiones de Archivo</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $infoRepo2;?>
        </tbody>
    </table>
</body>
</html>