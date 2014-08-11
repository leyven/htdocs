<?php

$dir = '1234';
$dirpruebas=$dir.'/pruebas';
$diranticipos=$dir.'/anticipos';
$dirdescargas=$dir.'/descargas';
$host="eu5.org";
	$port=21;
	$user="leyven.eu5.org";
	$password="scarletsin1";
// establecer una conexión básica
$conn_id = ftp_connect($host);

// iniciar sesión con nombre de usuario y contraseña
$login_result = ftp_login($conn_id, $user, $password);

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

// close the connection
ftp_close($conn_id);
?>