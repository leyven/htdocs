<html>
<head><title>Pagina Inicial</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<script type="text/javascript" src="script/script.js"></script>

<body background="imagenes/2.jpg" style="background-attachment: fixed">
<img src="imagenes/logo.png" alt="logo" width="283" height="157">


<form method="post">
<p>
  	<script type="text/javascript"></script>
    <input type="submit" name="Descargar" value="Descargas" formaction="Descargas.php" title="Descargue sus archivos una vez que haya realizado el pago total de su solicitud">
    <input type="submit" name="Pago/Anticipo" value="Pago/Anticipo" formaction="pago-anticipo.php" title="Cargue su pago o anticipo para que posteriormente se validen sus descargas">
    <input type="submit" name="ConsultaPruebas" value="Consultar pruebas" formaction="consultaPruebas.php" title="Consulte los archivos de pruebas o bocetos que el personal de la agencia ha colocado en respuesta a su solicitud">
  </p>
</form>

<h1 align="left"><b>Registro de solicitud</b></h1><br>
<label><b><big>Cliente nuevo</big></b></label>
  <input type="radio" name="nuevo" value="Cliente nuevo" onClick="mostrarNuevo()">
<label><b><big>Cliente frecuente</big></b></label>
  <input type="radio" name="nuevo" value="Cliente frecuente" onClick="mostrarFrecuente()">
  <br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="clientenuevo" id="clientenuevo" style='display:none;'>
	<script type="text/javascript"></script>
  <h1><b>Cliente Nuevo</b>
  </h1>
  <label><b>Nombre</b></label><br></label>
		<input type="text" name="nombre" required>
		<br>
		<label><b>Email</b></label>
		<br>
		<input type="text" name="email" required>
		<br>
		<label><b>Telefono</b></label>
		<br>
		<input type="text" name="telefono" required>
		<br>
		<input type="submit" name="agregar" value="Agregar">
		<br>
</div>
</form>

	<script type="text/javascript"></script>

	<form method="post">
	<div class="clientefrecuente" id="clientefrecuente" style='display:none;'>

	  <h1><b>Cliente frecuente</b></h1>
	  
		<label><b>Email</b></label>
		<br>
		<input type="text" name="email" required>
		<br>
		<input type="submit" name="submitfrec" value="Ingresar" onClick="rellenarFrecuente()">
		<br>
				<label><b>Descripcion</b></label><br>
		<textarea name="campoDescripcion" cols="30" rows="4"></textarea>
		<br>
		<label>Archivos</label><br>
		<input type="file" name="archivo[]" multiple="true">
</div>
</form>
<br>

<? 
include 'conexion.php';

//si se selecciona el boton agregar del formulario cliente nuevo
if(isset($_POST['agregar'])){
	$conexion=mysql_connect($host, $user, $pass) or die("Error al conectarse al servidor");
	$BaseDato=mysql_select_db($baseDatos, $conexion) or die("No se encuentra la base de datos");	
	
	$Nombre=$_POST['nombre'];
	$Email=$_POST['email'];
	$Telefono=$_POST['telefono'];

		$sql1="INSERT INTO usuario(Nombre, Email, Telefono)"."VALUES('$Nombre','$Email','$Telefono')";
		$query1=mysql_query($sql1);
		echo "Datos almacenados correctamente";
	
}

						//CLIENTE FRECUENTE


	//EN ESTA SECCION SE DEBE ENVIAR UN CORREO CON LO QUE ESCRIBIO y
//subir los archivos
	if(isset($_POST['submitfrec'])){
		include("conexion.php");
		$conexion2=mysql_connect($host, $user, $pass) or die("Error al conectarse al servidor");
		$BaseDato2=mysql_select_db($baseDatos, $conexion2) or die("No se encuentra la base de datos");	
		$emailQueEscribeEnElTextfield=$_POST['email'];
		$query="SELECT Email FROM usuario WHERE Email='$emailQueEscribeEnElTextfield'";
		$result=mysql_query($query);
		//VALIDAR QUE EL CORREO EXISTA
		$loQueTieneElCampoDescripcion=$_POST['campoDescripcion'];
		if(mysql_num_rows($result)>=1){
			echo "El correo existe";
			?>
			<br>
			<?
			echo "el campo contiene ".$loQueTieneElCampoDescripcion;

			//SUBIR ARCHIVOS
			$host="virrueta.org";
			$port=21;
			$user="a7x@virrueta.org";
			$pass="nucleoduro";
			$ruta3="PruebaCesar/solicitudesClienteFrecuente/".$emailQueEscribeEnElTextfield;
			$conn_id=@ftp_connect($host,$port);
			 if($conn_id){
		if(@ftp_login($conn_id,$user,$password)){
			if(@ftp_chdir($conn_id,$ruta3)){
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY)){


					echo "Fichero subido correctamente";

				//ENVIAR CORREO a solicitudes@virrueta.org
					$correoEscrito=$_POST['email'];

					$conexion3=mysql_connect($host, $user, $pass) or die("Error al conectarse al servidor");
					$BaseDato3=mysql_select_db($baseDatos, $conexion3) or die("No se encuentra la base de datos");	
					$sql4="SELECT id_usuario FROM usuario WHERE Email=".$correoEscrito;
					$ssql=mysql_query($sql4);

					$sql3="INSERT INTO solicitud(id_usuario)"."VALUES('$ssql')";
					$sqq=mysql_query($sqq);

					$obtt="SELECT num_solicitud FROM solicitud WHERE id_usuario=".$ssql;
					$asd=msql_query($obtt);
					echo "Datos almacenados correctamente";
					//$obtenerCorreo="SELECT Email FROM usuario WHERE idPeticion=".$obtenerElNumeroDeSolicitudDelTextField;
					//$a=mysql_query($obtenerCorreo);
					//este es para el cliente
					$para = $correoEscrito;
					$de = "From:".$correoEscrito;
					$asunto = "Numero de solicitud: ".$asd;
					$mensaje = "Estimado cliente, atenderemos lo mas pronto posible su solicitud.
					Agradecemos su preferencia. Saludos.";
					$ver = mail($para,$asunto,$mensaje,$de);
					
					//para el servidor
					$para2="solicitudes@virrueta.org";
					$de2="FROM:".$correoEscrito;
					$asunto2="Numero de solicitud: ".$asd;
					$mensaje2="Se ha solicitado una nueva peticion
					La peticion requerida es lo siguiente:".$loQueTieneElCampoDescripcion;
					$ver2=mail($para2, $asunto2, $mensaje2, $de2);
				}
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
			echo "el correo no existe";
		}


		}
		

		

?>

</body>
</html>