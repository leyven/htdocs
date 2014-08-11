<!DOCTYPE html>
<html>
<head>
	<title>selecion de favoritos</title>
	 <link rel="stylesheet" href="Estilo/Style.css">
</head>
<body>




<div>
<p>Consulta de pruebas</p>
	<form action="ver_dir.php" method="post">
		
		Archivos: <br/>
		<?php
		?>
		Preferencias <br/>
		Observaciones: <textarea autofocus name="comentarios">Pude expandir este campo de texto si asi lo desea</textarea> <br/>
		


<?php

include 'conexion.php';

$NumeroSolicitud=$_POST['NumeroSolicitud'];
$conexion=mysql_connect($host,$user,$pass) 
  or die("Problemas en la conexion");
mysql_select_db($basedatos,$conexion) or
  die("Problemas en la seleccion de la base de datos");
 
 $registros=mysql_query("select ruta_archivo from prueba_servidor where 
	num_solicitud='$NumeroSolicitud'",$conexion) or
  die("Problemas en el select:".mysql_error());
 


while($row = mysql_fetch_array($registros))
 { $ruta[]= (string)$row['ruta_archivo']; echo " "; 
	
}

for ($i=0; $i <count($ruta) ; $i++) { 
	$link[$i]=$NumeroSolicitud."/pruebas/".$ruta[$i];
	echo "    <input type=radio name=favorito value=".$ruta[$i].">"; 
	echo "		<a target=_blank href=".$link[$i]." >".$ruta[$i]."</a>";
	echo "<br/>";
}


?>
<input type="submit" name="guardarregistro" value="Guardar"/>
	</form>

<?php

$guardarregistro=$_POST['guardarregistro'];

if ($guardarregistro!=null)
{
	echo "paso";

	$nombrearchivo=$_POST['favorito'];
	
	$Comentarios=$_POST['comentarios'];
	echo $nombrearchivo;
	$sql="UPDATE prueba_servidor SET Preferencias=1,Comentarios='".$Comentarios."'
WHERE ruta_archivo='".$nombrearchivo."'";
echo $sql;
mysql_query($sql,$conexion ) or die ("problemas con la sentencia");
echo "sentencia realizada correctaente";

$para      = 'notificacionespruebas@virrueta.org';
$titulo =  $NumeroSolicitud;
$mensaje = $Comentarios;
$cabeceras = 'From: '.$EmailCliente.'' . "\r\n" .
    'Reply-To: '.$EmailCliente.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
}
?>
</div>
</body>
</html>