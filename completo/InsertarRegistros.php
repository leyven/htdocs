<html>
<head>
<title>Problema</title>
  <link rel="stylesheet" href="Estilo/Style.css">
</head>
<body>
<?php
include 'conexion.php';
$EmailCliente=$_POST['EmailCliente'];
$NombreCliente=$_POST['NombreCliente'];
$descripcion=$_POST['DescripcionCliente'];
$conexion=mysql_connect($host,$user,$pass) 
  or die("Problemas en la conexion");
mysql_select_db($basedatos,$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("insert into usuario(Nombre,Email,Telefono) 
	values ('$_REQUEST[NombreCliente]','$_REQUEST[EmailCliente]',$_REQUEST[TelefonoCliente])", 
   $conexion) or die("Problemas en el select".mysql_error());

$registros=mysql_query("select id_usuario from usuario where 
	Nombre='$_REQUEST[NombreCliente]'",$conexion) or
  die("Problemas en el select:".mysql_error());
  $reg=mysql_fetch_array($registros,MYSQL_NUM);

  $id_usuario=$reg[0];
 
mysql_query("insert into solicitud(id_usuario,descripcion) values 
            ('$id_usuario','$descripcion')", $conexion) or
  die("Problemas en el select".mysql_error());

  $registros=mysql_query("select num_solicitud from solicitud where 
	id_usuario='$id_usuario'",$conexion) or
  die("Problemas en el select:".mysql_error());
  $reg=mysql_fetch_array($registros,MYSQL_NUM);

  $num_solicitud=$reg[0];
  echo "pedido realizado con exito, su numero de solicitud es: ".$num_solicitud;
mysql_close($conexion);


$dir = (string)$num_solicitud;
$dirpruebas=$dir.'/pruebas';
$diranticipos=$dir.'/anticipos';
$dirdescargas=$dir.'/descargas';
$dirsolicitudes=$dir.'/solicitudes';

// establecer una conexión básica
$conn_id = ftp_connect($hostFTP);

// iniciar sesión con nombre de usuario y contraseña
$login_result = ftp_login($conn_id, $userFTP, $passwordFTP);

// intentar crear el directorio $dir
if (ftp_mkdir($conn_id, $dir)) {
 echo "creado con éxito $dir\n";
} else {
 echo "Ha habido un problema durante la creación de $dir\n";
}

if (ftp_mkdir($conn_id, $dirpruebas)) {
 echo "creado con éxito $dir\n";
} else {
 echo "Ha habido un problema durante la creación de $dirpruebas\n";
}

if (ftp_mkdir($conn_id, $diranticipos)) {
 echo "creado con éxito $dir\n";
} else {
 echo "Ha habido un problema durante la creación de $diranticipos\n";
}

if (ftp_mkdir($conn_id, $dirdescargas)) {
 echo "creado con éxito $dir\n";
} else {
 echo "Ha habido un problema durante la creación de $dirdescargas\n";
}

if (ftp_mkdir($conn_id, $dirsolicitudes)) {
 echo "creado con éxito $dir\n";
} else {
 echo "Ha habido un problema durante la creación de $dirdescargas\n";
}


  $ruta=$dir.'/solicitudes';
if(@ftp_chdir($conn_id,$ruta))
      {
        # Subimos el fichero
        if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY))
          echo "Fichero subido correctamente ";
        else
          echo "No ha sido posible subir el fichero";
      }else
        echo "No existe el directorio especificado";

// close the connection
ftp_close($conn_id);

$para      = .$EmailCliente;
$titulo = "para el señor o señora :".$NombreCliente;
$mensaje = 'dentro de poco nos pondremos de acuerdo para acordar el precio su numero de solicitud es '.$num_solicitud;
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);

$para      = 'solicitudes@virrueta.org';
$titulo =  $num_solicitud;
$mensaje = $descripcion;
$cabeceras = 'From: '.$EmailCliente.'' . "\r\n" .
    'Reply-To: '.$EmailCliente.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);

header ("Location: IndexCliente.php");



  


?>
</body>
</html>