<html>
<head>

</head>
<body>
<?php 
//$archivo =$_FILES["archivo"]['name'];
//$destino ="C:\AppServ\www\practicaFinal\prueba_cliente\archivo".$archivo;
//tmp_nanme =ruta del archivo en donde se quiere guardar
//copy($_FILES["archivo"]['tmp_name'], $destino);
//echo "Archivo guardado exitosamente";
include 'conexion.php';

$conexion= mysql_connect($host, $user, $pass) or die("Error al conectarse a la base de datos");
$DatBa= mysql_select_db("agenciapublicidad", $conexion) or die("No se pudo encontrar la base de datos");
$sql=mysql_query($DatBa);

$idPeticionQueEscribeElUsuarioEnElTextField=$_POST['numSolicitud'];

	//obtener todos los correos
	$obtenerid_usuario=mysql_query("SELECT id_usuario FROM solicitud WHERE num_solicitud=".$idPeticionQueEscribeElUsuarioEnElTextField);	
	$b=mysql_fetch_array($obtenerid_usuario);
	//echo "  imprimo b:".$b['id_usuario'];
	$obtenerCorreo="SELECT Email FROM usuario WHERE id_usuario=".$b['id_usuario'];
	$a=mysql_query($obtenerCorreo);
	$EstaSegundaMadre= @mysql_fetch_array($a);
	if($EstaSegundaMadre>=1){
		?>
		<br>
		<?
		echo "Si existe un correo con ese numero de peticion";
		//REALIZAMOS EL LOGIN
		$conn_id=@ftp_connect($hostFTP, $port);
		if($conn_id)
	{
		if(@ftp_login($conn_id,$userFTP,$passwordFTP))
		{
			// se cambia al directorio especificado
			$ruta2="PruebaCesar/prueba_cliente/".$idPeticionQueEscribeElUsuarioEnElTextField;
			if(@ftp_chdir($conn_id,$ruta2))
			{
				// Se sube el fichero
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY))
					echo "Fichero subido correctamente";
				else
					echo "No ha sido posible subir el fichero";
			}else
				echo "No existe el directorio especificado";
		}else
			echo "El usuario o la contraseña son incorrectos";

		ftp_close($conn_id);
	}else
		echo "No ha sido posible conectar con el servidor";
}else{
   echo "Selecciona un archivo...";
}

/*	else{
		?>
		<br>
		<?
		echo "No existe ese numero de solicitud";
	}
*/
?>

</body>
