<?php 
include 'conexion.php';

$conexion= mysql_connect($host, $user, $pass) or die("Error al conectarse a la base de datos");
$DatBa= mysql_select_db("agenciapublicidad", $conexion) or die("No se pudo encontrar la base de datos");
$sql=mysql_query($DatBa);

$idPeticionQueEscribeElUsuarioEnElTextField=$_POST['numSolic'];

	//obtener todos los correos
	$obtenerid_usuario=mysql_query("SELECT id_usuario FROM solicitud WHERE num_solicitud=".$idPeticionQueEscribeElUsuarioEnElTextField);	
	$b=mysql_fetch_array($obtenerid_usuario);
	//echo "  imprimo b:".$b['id_usuario'];
	$obtenerCorreo="SELECT Email FROM usuario WHERE id_usuario=".$b['id_usuario'];
	$a=mysql_query($obtenerCorreo);
	$EstaSegunda= @mysql_fetch_array($a);
	if($EstaSegunda>=1){
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
			$ruta2="PruebaCesar/Descargas/".$idPeticionQueEscribeElUsuarioEnElTextField;
			if(@ftp_chdir($conn_id,$ruta2))
			{
				// Se sube el fichero
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY)){
					echo "Fichero subido correctamente";

					$obtenerCorreo="SELECT Email FROM usuario WHERE idPeticion=".$idPeticionQueEscribeElUsuarioEnElText;
					$a=mysql_query($obtenerCorreo);
					echo "la a es: ".$a;
					$para = $a; //cambiar los correos dinamicamente
					$de = "From:".$a;
					$asunto = "Confirmacion Pruebas";
					$mensaje = "Estimado cliente, le confirmamos que los archivos han sido cargados.
					ya puede ir a la seccion de descargas para poder obtener los archivos en base
					a su pedido, ingrese el numero de solicitud que aca se le adjunta para poder acceder a descargarlos. 
					Agradecemos su preferencia. Saludos.
					Número de registro: ".$idPeticionQueEscribeElUsuarioEnElText;
					$ver = mail($para,$asunto,$mensaje,$de);
				}
				else
					?>
					<br>
					<?
					echo "No ha sido posible subir el fichero";
			}else
					?>
					<br>
					<?
				echo "No existe el directorio especificado";
		}else
			echo "El usuario o la contraseña son incorrectos";

		ftp_close($conn_id);
	}else
		echo "No ha sido posible conectar con el servidor";
}else{
   echo "La peticion no existe";
}
?>