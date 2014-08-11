<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","") 
  or  die("Problemas en la conexion");

mysql_select_db("game",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select *
                       from personajes",$conexion) or
  die("Problemas en el select:".mysql_error());

while ($reg=mysql_fetch_array($registros))
{
  echo "Nombre:".$reg['Nombre']."<br>";
  echo "Ataque :".$reg['Ataque']."<br>";
  echo "Ataque magico:".$reg['AtaqueMagico']."<br>";
  echo "Defensa:".$reg['Defensa']."<br>";
  echo "Defensa Magica:".$reg['DefensaMagica']."<br>";
  echo "Hp:".$reg['HitPoints']."<br>";
  echo "Genero: ";
  
  switch ($reg['Genero']) {
    case 1:echo "Hombre";
           break;
    case 0:echo "Mujer";
           break;
   
  }
  echo "<br>";
  echo "<hr>";
}
mysql_close($conexion);
?>
</body>
</html> 