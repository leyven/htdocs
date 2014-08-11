<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","") or 
  die("Problemas en la conexion");

mysql_select_db("game",$conexion) or
  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select *
                       from personajes where Nombre='$_REQUEST[nombre]'",$conexion) or
  die("Problemas en el select:".mysql_error());

if ($reg=mysql_fetch_array($registros))
{
  echo "Nombre:".$reg['Nombre']."<br>";
  echo "Genero:";
  switch ($reg['Genero']) {
     case 0:echo "mujer";
            break;
     case 1:echo "Hombre";
            break;
     
  }
}
else
{
  echo "No existe un personaje con ese nombre.";
}
mysql_close($conexion);
?>
</body>
</html> 