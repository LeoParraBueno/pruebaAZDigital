# pruebaAZDigital
DESCRIPCIÓN:

En este repositorio se encuentra el codigo fuente y la documentación de la prueba técnica  en la cual se puso a prueba mis conocimientos en PHP, consumo de servicios SOAP, diseño/manipulación de bases de datos relacionales (MySQL para este caso) y manejo de herramientas de versionamiento como GIT

OBJETIVOS DE LA PRUEBA:

- Consumir la operación “BuscarArchivo” del web services SOAP proporcionado por quien aplica esta prueba técnica.

- Alamcenar en una base de datos relacional la información rescatada del sevicio SOAP y así mismo obtener la extensión
  del archivo y el tipo de este.
  
- Generar reporte en PHP que cruce las tablas del modelo de la base de datos diseñada por el postulado y en donde se encuentra
  todo la información proveniente del servicio SOAP.

- Generar reporte en PHP que agrupe todos los tipos de extensión de los nombres de archivos que se encuentran almacenados en la
  base de datos y muestre la cuenta de cada uno de ellos.
  
- Usar git y github para la publicación de este proyecto a fin de poder ser revisado por quien aplica la prueba.
  
SERVIDORES USADOS:

- Servidor web Apache
- Servidor de base de datos MySQL

TIPO DE SERVICIOS CONSUMIDOS:

- SOAP

LENGUAJE DE PROGRAMACIÓN:

- PHP

RUTA DEL ARCHIVO WSDL:

- http://test.analitica.com.co/AZDigital_Pruebas/WebServices/ServiciosAZDigital.wsd

RUTA DEL END-POINT:

- http://test.analitica.com.co/AZDigital_Pruebas/WebServices/SOAP/index.php

DESCRIPCIÓN DE LOS ARCHIVOS QUE CONFORMAN AL PROYECTO:

- index.php: Este es el archivo de inicio de la prueba en la cual se consume el web service proveido por el evaluador de la misma,
             se almacena la información rescatada en la base de datos llamada "pruebaazdigital" y muestra una GUI simple en la que
             se le da la opción de elegir el tipo de reporte que pueda llegar a querer solicitar el usuario (la opciones son
             Reporte1 = Información resccatada el servicio SOAP y cruce de tablas de la BD, Reporte2: Cantidad de archivos agrupados
             por extension).

- AZDigitalSOAPClient.php: En este archivo php se encuentra la clase que contiene las funciones relacionadas con el consumo del web
                           web service SOAP y el almacenamiento de la información rescatada en la base de datos.
                           
- DBCON.php: Aquí se encuentra la clase que contiene las funciones de conexión y desconexión a la base de datos, de inserción y de
             consulta a la misma.
             
 - reporte1.php: Aquí se encuentra una GUI en formato de tabla que muestra la información rescatada del servicio SOAP y que se
                 ecuentra almacenada en la base de datos del proyecto; está información consta del ID, nombre, tipo y extensión
                 del archivo.
                 
  - reporte2.php: Aquí se encuentra una GUI en formato de tabla que muestra las extensiones de archivos que se pueden encontrar en los
                  datos almacenados en la base datos y la cantidad de registros que corresponden a cada extensión.
                  
- Prueba-AZDigital-soapui-project.xml: Este archivo es simplemente el proyecto generado en soapUI a modo de simular el consumo del
                                       servicio que se debía consultar.
                                  
- Prueba Area Tecnica.docx: Documento en el cual se encuentra el enunciado y los requerimientos para esta prueba.

- Documentacion Prueba AZDigital.docx: Documento en el que se encuentra esta información y algunas otras cosas más.

RECURSOS CONSULTADOS:

- https://www.youtube.com/watch?v=Sa1tk14OHAY&list=PLqUdkzATY9ZtwCr8VuG3cFDvgJ3Oqrtyy&index=6
- https://www.youtube.com/watch?v=zyPcHg33Jj8
- https://www.ecodeup.com/como-crear-un-cliente-y-consumir-un-servicio-web-soap-en-php/
- https://blog.osusnet.com/2008/08/06/consumiendo-webservices-soap-desde-php/
- https://www.php.net/manual/es/class.soapclient.php
