<<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="Estilo/Style.css">
</head>
<body>


<?php
include 'conexion.php';
$num_solicitud=$_POST['NumeroSolicitud'];
$tipopago=$_POST['pago'];
$anticipo=0;
$pagototal=0;
if($tipopago=="1")
{
	$anticipo=0;
	$pagototal=1;
	$tipopago="pago total";
}
else{
		$anticipo=1;
		$pagototal=0;
		$tipopago="anticipo";
}

$conexion=mysql_connect($host,$user,$pass) 
  or die("Problemas en la conexion");
mysql_select_db($basedatos,$conexion) or
  die("Problemas en la seleccion de la base de datos");

 mysql_query("insert into pago_anticipo(num_solicitud,anticipo,pago) values 
            ('$num_solicitud','$anticipo','$pagototal')", $conexion) or
  die("Problemas en el select".mysql_error());


  $registros=mysql_query("select id_usuario from solicitud where 
	num_solicitud='$num_solicitud'",$conexion) or
  die("Problemas en el select:".mysql_error());
  $reg=mysql_fetch_array($registros,MYSQL_NUM);

  $id_usuario=$reg[0];
  
   $registros=mysql_query("select Email from usuario where 
	id_usuario='$id_usuario'",$conexion) or
  die("Problemas en el select:".mysql_error());
  $reg=mysql_fetch_array($registros,MYSQL_NUM);

  $EmailCliente=$reg[0];

  mysql_close($conexion);
  echo $num_solicitud.$anticipo.$pagototal;


$para      = 'nyhedgg@gmail.com';
$titulo =  "pago de el numero de solicitud ".$num_solicitud;
$mensaje = "su pago esta en espera a ser verificado";
$cabeceras = 'From: '.$correoagencia.'' . "\r\n" .
    'Reply-To: '.$correoagencia.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($para, $titulo, $mensaje, $cabeceras);

$para      = 'nyhedgg@gmail.com';
$titulo =  $num_solicitud."".$tipopago;
$mensaje = $descripcion;
$cabeceras = 'From: '.$EmailCliente.'' . "\r\n" .
    'Reply-To: '.$EmailCliente.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);


?>

</body>
</html>