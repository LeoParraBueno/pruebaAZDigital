<?php

class baseDatos {
    private const SERV = 'localhost';
	private const USR = 'root';
	private const PSWR = 'E1Cv5_5FDGDuyt';
	private const DB = 'pruebaazdigital';

    public function conectarDB () {
        $conn = mysqli_connect(self::SERV, self::USR, self::PSWR, self::DB);
        if(!$conn) {
            die('Conexión Fallida: '.mysqli_error());
        }
        $tildes = $conn->query("SET NAMES 'utf8'");

        return $conn;
    }

    public function desconectarDB ($conexion) {
        mysqli_close($conexion);
    }
    
    public function registrarArchivo ($idArchivo, $nombreArchivo, $extArchivo, $tipoArchivo, $conn) {
        try {
            
            //$conexion = mysqli_query($conn, "INSERT INTO infoarchivos VALUES ('2', 'PRUEBA.pdf') ON DUPLICATE KEY UPDATE id = '2';");
            $conexion = mysqli_query($conn, "INSERT INTO infoarchivos VALUES ('".$idArchivo."', '".$nombreArchivo."') ON DUPLICATE KEY UPDATE id = '".$idArchivo."';");
            if($conexion){
                $conexion = mysqli_query($conn, "INSERT INTO tipoarchivo VALUES ('".$idArchivo."', '".$tipoArchivo."', '".$extArchivo."') ON DUPLICATE KEY UPDATE id = '".$idArchivo."';");
                return $conexion;
            }else{
                return -1;
            }
            
            
        } catch (\Throwable $th) {
            return 0;
        }
        
    }

    public function mostrarReporte1 ($conn) {

        $datos = '';

        $resultado = mysqli_query($conn,"SELECT infoarchivos.*, tipoarchivo.`tipo de archivo`, tipoarchivo.`extension de archivo` 
                      FROM infoarchivos INNER JOIN tipoarchivo ON infoarchivos.id = tipoarchivo.id;");

        
        if(!is_null($resultado))
        {
            while($row=mysqli_fetch_array($resultado))
            {

                $datos .= "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$row[3]."</td>
                    </tr>";
            }
        }

        return $datos;          
    }

    public function mostrarReporte2 ($conn) {

        $datos = '';

        $resultado = mysqli_query($conn,"SELECT `extension de archivo`, COUNT(*)
                                         FROM tipoarchivo GROUP BY `extension de archivo`;");

        
        if(!is_null($resultado))
        {
            while($row=mysqli_fetch_array($resultado))
            {

                $datos .= "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    </tr>";
            }
        }

        return $datos;          
    }

}
    
?>