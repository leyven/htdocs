<?php
##### http://www.lawebdelprogramador.com #####

# Comprovamos que se haya enviado algo desde el formulario
if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{
	# Definimos las variables
	$host="eu5.org";
	$port=21;
	$user="leyven.eu5.org";
	$password="scarletsin1";
	$ruta="images";

	# Realizamos la conexion con el servidor
	$conn_id=@ftp_connect($host,$port);
	if($conn_id)
	{
		# Realizamos el login con nuestro usuario y contraseña
		if(@ftp_login($conn_id,$user,$password))
		{
			# Canviamos al directorio especificado
			if(@ftp_chdir($conn_id,$ruta))
			{
				# Subimos el fichero
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY))
					echo "Fichero subido correctamente";
				else
					echo "No ha sido posible subir el fichero";
			}else
				echo "No existe el directorio especificado";
		}else
			echo "El usuario o la contraseña son incorrectos";
		# Cerramos la conexion ftp
		ftp_close($conn_id);
	}else
		echo "No ha sido posible conectar con el servidor";
}else{
   echo "Selecciona un archivo...";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<title>Subir ficheros al servidor mediante FTP</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["HTTP_SELF"]?>">
		<div>Fichero: <input type="file" name="archivo" id="image" maxlength="45"></div>
		<dif><input type="submit" name="enviar" value="enviar"/></div>
	</form>
</body>
</html>