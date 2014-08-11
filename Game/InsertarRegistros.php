<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","") 
  or die("Problemas en la conexion");
mysql_select_db("game",$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("insert into personajes(Nombre,Ataque,AtaqueMagico,Defensa,DefensaMagica,HitPoints,Genero) 
	values ('$_REQUEST[nombre]','$_REQUEST[atk]','$_REQUEST[matk]','$_REQUEST[def]','$_REQUEST[magdef]','$_REQUEST[hp]',$_REQUEST[genero])", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
echo "El alumno fue dado de alta.";
echo "$_REQUEST[nombre],$_REQUEST[atk],$_REQUEST[matk],$_REQUEST[def],$_REQUEST[magdef],$_REQUEST[hp],$_REQUEST[genero]";
?>
</body>
</html>