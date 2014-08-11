<!doctype html>
<html>
<head>
<meta charset="koi8-r">
<title>Prueba Servidor</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<form action="prueba_servidor.php" method="post" enctype="multipart/form-data">
  <p>
  <label> <span style="text-align: center"> N&uacute;mero de Solicitud </span></label>
  <span style="text-align: center">
  <input type="text" name="numero_solicitud" required/>
  </span></p>
  <p>
    
    <span style="text-align: center; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;">
    <input type="file" name="archivo[]" multiple required/>
  </span></p>
  <span style="text-align: center">
  <input type="submit" name="agregar" value="Notificar"/>
  </span>
</form>


<?
if(isset($_POST['agregar']))
{
	include("conexion.php");
	$link= mysql_connect($sitio,$usuario,$password);
mysql_select_db($bd, $link);
	
	$comprobar_cadena = "SELECT * FROM solicitud WHERE numero_solicitud=".$_POST['numero_solicitud'];
	
	$comprobar_consulta = mysql_query($comprobar_cadena);
	
	$informacion_cliente = mysql_fetch_array($comprobar_consulta);

	$usuariosql = "SELECT Email FROM usuario WHERE idUsuario=".$informacion_cliente['idUsuario'];
	$pendejo_cristian = mysql_query($usuariosql);
	$datos_cliente = mysql_fetch_array($pendejo_cristian);
	$verficar = @mysql_num_rows($comprobar_consulta);
	if($verficar == 0 ){
		echo "Número de solicitud incorrecto";
		}
	if($verficar >0)
	{
	$host="ftp.virrueta.org";
	$port=21;
	$user="a7x@virrueta.org";
	$password="nucleoduro";
	$ruta="CristianDesigner/Pedidos/".$_POST['numero_solicitud']."/Pruebas";
	$conn_id=@ftp_connect($host,$port);
	if($conn_id){
		
		if(@ftp_login($conn_id,$user,$password))
		{
			# Canbiamos al directorio especificado
			if(@ftp_chdir($conn_id,$ruta))
			{
				# Subimos el fichero
				$files=array();
$fdata=$_FILES['archivo'];

for($i=0;$i<count($fdata['name']);++$i){
        $files[]=array(
    'name'    =>$fdata['name'][$i],
    'type'  => $fdata['type'][$i],
    'tmp_name'=>$fdata['tmp_name'][$i],
    'error' => $fdata['error'][$i], 
    'size'  => $fdata['size'][$i]  
    );
    }
	
foreach ($files as $file) { 
    
	ftp_put($conn_id,$file['name'],$file['tmp_name'],FTP_BINARY);
}	

					
			
					$para = $datos_cliente['Email'];
					$de = "From:"."notificacionespruebas@virrueta.org";
					$asunto = "Confirmacion Pruebas";
					$mensaje = "Buenos días estimado cliente, le confirmamos lo siguiente: 
					ya puede ir al apartado de pruebas clientes para poder visualizar las 
					pruebas previas a su pedido ingrese con su número de solicitud que se le 					ha asignado desde su registro. 
					Número de registro: ".$_POST['numero_solicitud'];
					$ver = mail($para,$asunto,$mensaje,$de);
					
					
					
			
			}else
				echo "No existe el directorio especificado";
		}else
			echo "El usuario o la contraseña son incorrectos";
		# Cerramos la conexion ftp
		ftp_close($conn_id);
		
	
		}
		
		else {
			
			echo "No se pudo conectar al servidor";
			}

	if($ver == true)
	{
		echo "Si se envio el mensaje";
		}
		else 
		{
			echo "No se pudo enviar el mensaje";
			}
	}
	?> 
<script language="javascript"> 
window.location='index.php'; 
</script> 
<?php 
}

?>


</body>
</html>