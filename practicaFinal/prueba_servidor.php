<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro de pruebas</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<body background="imagenes/2.jpg" style="background-attachment: fixed">
<img src="imagenes/logo.png" alt="logo" width="283" height="157">

<form action="prueba_servidor.php" method="post" enctype="multipart/form-data">
  <h1>Registro de pruebas</h1>
  <br>
  <p>
  <label> Número de Solicitud </label>
  <input type="text" name="numero_solicitud" required/>
  </p>
  <p>
    <input type="file" name="archivo" required/>
  </p>
<input type="submit" name="agregar"/>
</form>
<?
if(isset($_POST['agregar']))
{
	$idPeticionQueEscribeElUsuarioEnElTextField=$_POST['numero_solicitud'];

	$obtenerCorreo="SELECT Email FROM usuario WHERE idPeticion=".$idPeticionQueEscribeElUsuarioEnElTextField;
	$a=mysql_query($obtenerCorreo);

	$host="ftp.virrueta.org";
	$port=21;
	$user="a7x@virrueta.org";
	$password="nucleoduro";
	$ruta="PruebaCesar/pruebaServidor/".$_POST['numero_solicitud'];
	$conn_id=@ftp_connect($host,$port);
	if($conn_id){
		
		if(@ftp_login($conn_id,$user,$password))
		{
			# Cambiamos al directorio especificado
			if(@ftp_chdir($conn_id,$ruta))
			{
				# Subimos el fichero
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY)){
					echo "Fichero subido correctamente";
					$para = $a; //cambiar los correos dinamicamente
					$de = "From:".$a;
					$asunto = "Confirmacion Pruebas";
					$mensaje = "Estimado cliente, le confirmamos que los archivos han sido cargados.
					ya puede ir a la seccion de pruebas para poder visualizar las 
					pruebas previas a su pedido, ingrese el numero de solicitud que aca se le adjunta para poder visualizarlo. 
					Número de registro: ".$_POST['numero_solicitud'];
					$ver = mail($para,$asunto,$mensaje,$de);
					
					}
					
				else
					echo "No ha sido posible subir el fichero";
			}else
				echo "No existe el directorio especificado";
		}else
			echo "El usuario o la contraseña son incorrectos";
		ftp_close($conn_id);
		
	
		}
		
		else {
			
			echo "No se pudo conectar al servidor";
			}

	if($ver == true)
	{
		echo "El mensaje fue enviado";
		}
		else 
		{
			echo "El mensaje no  ha podido ser enviado";
			}
	}
?>

<a href="indexGerencia.php">Regresar</a>
</body>
</html>