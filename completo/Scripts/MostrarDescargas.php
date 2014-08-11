<?php

include 'conexion.php';

$NumeroSolicitud=$_POST['NumeroSolicitud'];
$conexion=mysql_connect($host,$user,$pass) 
  or die("Problemas en la conexion");
mysql_select_db($basedatos,$conexion) or
  die("Problemas en la seleccion de la base de datos");
 
 $registros=mysql_query("select Url_archivoDescarga from descarga where 
	num_solicitud='$NumeroSolicitud'",$conexion) or
  die("Problemas en el select:".mysql_error());
 

while($row = mysql_fetch_array($registros))
 { $ruta[]= (string)$row['Url_archivoDescarga']; echo " "; 
	
}

for ($i=0; $i <count($ruta) ; $i++) { 
	$link[$i]=$userFTP."/".$NumeroSolicitud."/descargas/".$ruta[$i];
	echo "<a href=".$link[$i]." download=".$ruta[$i].">Archivo ".$i."</a>";
}


?>