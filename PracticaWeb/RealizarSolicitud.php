<?php
$id_usuario="";
$conexion=mysql_connect("localhost","root","") 
  or die("Problemas en la conexion");
$DatBa= mysql_select_db("agenciapublicidad", $conexion) or die("No se pudo encontrar la base de datos");
$sql=mysql_query($DatBa);

$nombre=$_POST['NombreCliente'];
$email=$_POST['EmailCliente'];
$telefono=$_POST['TelefonoCliente'];
$descripcion=$_POST['Descripcion'];

//mysql_query("insert into usuario(Nombre,Email,Telefono) 
//	values ('"+$nombre+"','"+$email+"','"+$telefono+"')", 
  // $conexion) or die("Problemas en el select".mysql_error());
$cadenaInsert=  "insert into usuario(Nombre,Email,Telefono) 
	values ('"+$nombre+"','"+$email+"',"+$telefono+")";
	echo $cadenaInsert;
mysql_query($conexion,"insert into usuario(Nombre,Email,Telefono) 
	values ('"+$nombre+"','"+$email+"',"+$telefono+")");

$id_usuario=mysql_query("SELECT id_usuario FROM usuario WHERE Nombre='"+$nombre+"'");	
mysql_query($conexion,"insert into solicitud (num_solicitud,descripcion) 
	values ("+$id_usuario+",'"+$descripcion+"')");
mysql_close($conexion);
echo "Operacion realizada con exito";
?>