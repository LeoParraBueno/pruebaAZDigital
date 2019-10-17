<?php
include("DBCON.php");

class AZDigitalSOAPClient {

    private const WSDLAZDigitalServices = "http://test.analitica.com.co/AZDigital_Pruebas/WebServices/ServiciosAZDigital.wsdl";
    private const URLAZDigitalServices = "http://test.analitica.com.co/AZDigital_Pruebas/WebServices/SOAP/index.php";

    public function buscarArchivos ($parametros) {

        $AZDigitalCliente = new SoapClient(self::WSDLAZDigitalServices);

        $AZDigitalCliente->__setLocation(self::URLAZDigitalServices);

        try {
            //return $result = $AZDigitalCliente->__getFunctions();
            return $result = $AZDigitalCliente->BuscarArchivo($parametros);
        } catch (SoapFault $th) {
            return $th;
        }
    }

    public function guardarArchivosenBD ($resultadosStdClass) {

        $db = new baseDatos();
        $con = $db->conectarDB ();

        for ($i=0; $i < sizeof($resultadosStdClass->Archivo); $i++) { 
            
            //Almacenamos de manera temporal los nombres e ids del cada uno los archivos consultados del web service
            $nombreArchivo = $resultadosStdClass->Archivo[$i]->Nombre;
            $idArchivo = $resultadosStdClass->Archivo[$i]->Id;

            //Extraemos la extension del archivo y posteriormente se detecta que tipo de archivo es
            $indice = strrpos($nombreArchivo, '.', -1);
            $extension = substr($nombreArchivo, $indice);

            switch($extension) {
                case ".pdf":
                    $tipoArchivo = "Portable Document Format";
                    break;
                case ".xml":
                    $tipoArchivo = "eXtensible Markup Language";
                    break;
                case ".html":
                    $tipoArchivo = "Hypertext Markup Language";
                    break;
                case ".css":
                    $tipoArchivo = "Cascading Style Sheets";
                    break;
                case ".js":
                    $tipoArchivo = "Documento Javascript";
                    break;
                case ".png":
                    $tipoArchivo = "Portable Network Graphics";
                    break;
                case ".jpg":
                    $tipoArchivo = "Joint Photographic Experts Group";
                    break;
                case ".mp4":
                    $tipoArchivo = "archivo comprimido MPEG4";
                    break;
                case ".mpeg":
                    $tipoArchivo = "Moving Picture Experts Group";
                    break;
                case ".mp3":
                    $tipoArchivo = "MPEG-1 Audio Layer III o MPEG-2 Audio Layer III";
                    break;
                case ".p12":
                    $tipoArchivo = "copia de seguridad con clave privada de un certificado";
                    break;
                case ".txt":
                    $tipoArchivo = "Archivo de texto plano";
                    break;
                case ".docx":
                    $tipoArchivo = "Documento de Word";
                    break;
                case ".wsdl":
                    $tipoArchivo = "Web Services Description Language";
                    break;
                default:
                    $tipoArchivo = "DESCONOCIDO";
            }

            //Finalmente se procede a almacenar en a base de datos. Si ya existe el archivo en la base de datos se omite la inserción del registro
            $db->registrarArchivo ($idArchivo, $nombreArchivo, $extension, $tipoArchivo, $con);   
        }

        //Se cierra la conexión con la base de datos
        $db->desconectarDB($con);
       
    }
}
?>