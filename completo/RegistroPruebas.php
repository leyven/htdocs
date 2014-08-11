<html>
<head>
	<script type="text/javascript" src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/Script.js"></script>
	<link rel="stylesheet" href="Estilo/Style.css">
</head> 
<body> 
<div id="RegistroPruebas">
<p>Registro de Pruebas</p>
	<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["HTTP_SELF"]?>">
		Numero de solicitud: <input type="text" name="NumeroSolicitud"/>  <br/>
		
		Archivos: </br>
		<input type="file" name="archivo" multiple required/>  <br/>
		<input type="submit" name="notificar" value="notificar"/>
	</form>

</div>

</body>
</html>

<?php

include 'conexion.php';
# Comprovamos que se haya enviado algo desde el formulario
if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{
	# Definimos las variables
	$num_solicitud=$_POST['NumeroSolicitud'];
	$dir = (string)$num_solicitud;
	$ruta=$dir."/pruebas";

	# Realizamos la conexion con el servidor
	$conn_id=@ftp_connect($hostFTP,$port);
	if($conn_id)
	{
		# Realizamos el login con nuestro usuario y contraseña
		if(@ftp_login($conn_id,$userFTP,$passwordFTP))
		{
			# Canviamos al directorio especificado
			if(@ftp_chdir($conn_id,$ruta))
			{
				# Subimos el fichero
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY))
					echo "Fichero subido correctamente ";
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
	$nombreftp=$_FILES["archivo"]["name"];
	$nombrearchivo = (string)$nombreftp;
$archivoruta=$nombreftp;
///echo $archivoruta;
if( $_POST['notificar']=="notificar")
{
	$conexion=mysql_connect($host,$user,$pass) 
  or die("Problemas en la conexion");
mysql_select_db($basedatos,$conexion) or
  die("Problemas en la seleccion de la base de datos");

 mysql_query("insert into prueba_servidor(ruta_archivo,num_solicitud) values 
            ('$archivoruta','$num_solicitud')", $conexion) or
  die("Problemas en el select".mysql_error());
   
}
?>
