<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro de Pagos o Anticipos</title>
</head>

<body>
<form action="Registro_Pagos.php" method="post" enctype="multipart/form-data">
<label>Numero de Solicitud</label>
<input type="text" name="numero_solicitud"/>
<br/>
<br/>
<input type="radio" name="pago" value=0 required/>

<label>Anticipo</label>
<input type="radio" name="pago" value=1 required/>
<label>Pago Total</label>
<input type="file" name="comprobante" required/>
<br/>
<input type="submit" name="ok" value="Guardar"/>

<?php
  include("conexion.php");
  
  $link= mysql_connect($sitio,$usuario,$password);
  mysql_select_db($bd, $link);
	  
	  $comprobar_cadena = "SELECT * FROM solicitud WHERE numero_solicitud=".$_POST['numero_solicitud'];
	  
	  $comprobar_consulta = mysql_query($comprobar_cadena);
	  $ji = mysql_fetch_array($comprobar_consulta);
	  $verficar = @mysql_num_rows($comprobar_consulta);
  if(isset($_POST['ok']))
  {
	if($verficar>0){
	  $host="ftp.virrueta.org";
	  $port=21;
	  $user="a7x@virrueta.org";
	  $password="nucleoduro";
	  $ruta="CristianDesigner/Pedidos/".$_POST['numero_solicitud']."/Pagos_Anticipos";
	  $ruta2 = "www.programacionweb.virrueta.org/Avenged/".$ruta;
	  $conn_id=@ftp_connect($host,$port);
	  $archivo = $_FILES['comprobante'];
	  $recibir = $_POST['pago'];
	  if($conn_id){
		 
		  if(@ftp_login($conn_id,$user,$password))
		  {
			  if(@ftp_chdir($conn_id,$ruta))
			  {
				  
				  
			if(@ftp_put($conn_id,$_FILES['comprobante']['name'],$_FILES['comprobante']['tmp_name'],FTP_BINARY))
					echo "Fichero subido correctamente";
				else
					echo "No ha sido posible subir el fichero";
			  $link= mysql_connect($sitio,$usuario,$password);
  mysql_select_db($bd, $link);
			
		   $usuariosql = "SELECT * FROM usuario WHERE idUsuario=".$ji['idUsuario'];
	$pendejo_cristian = mysql_query($usuariosql);
	$datos_cliente = mysql_fetch_array($pendejo_cristian);
		  echo "ESTA: ".$datos_cliente['Email'];
	  if($recibir == 1)
	  	{
				  echo "ESTA: ".$datos_cliente['Email'];
  $sqlant = "INSERT INTO pago_anticipo (Comprobante_ruta,Anticipo,numero_solicitud,Pago) VALUES('$ruta2','0','$_POST[numero_solicitud]',1)";
		  $ejec = mysql_query($sqlant);
			  $para = "pagos@virrueta.org";
					$de = "From:"."Cristian Designer Sistema de Pagos y anticipos";
					$asunto = "Pago de: ".$_POST['numero_solicitud'];
					$mensaje = "El cliente: ".$datos_cliente['Nombre']." Ha realizado su pago total del producto";
					mail($para,$asunto,$mensaje,$de);
					$para3 = $datos_cliente['Email'];
					$de3 = "From:"."Cristian Desginer Sistema de Pagos y anticipos";
					$asunto3 = "Notificación";
					$mensaje3 = "Muchas gracias su pago será revisado por nuestro personal";	
				   mail($para3,$asunto3,$mensaje3,$de3);
		}
		  
		  if($recibir == 0) {
		    $sqlant = "INSERT INTO pago_anticipo (Comprobante_ruta,Anticipo,numero_solicitud,Pago) VALUES('$ruta2',1,'$_POST[numero_solicitud]',0)";
		  $ejec = mysql_query($sqlant);
			  $para = "pagos@virrueta.org";
					$de = "From:"."Cristian Desginer Sistema de Pagos y anticipos<cristianrocker93@gmail.com>";
					$asunto = "Anticipo de: ".$_POST['numero_solicitud'];
					$mensaje = "El cliente: ".$datos_cliente['Nombre']." Ha realizado un   anticipo del producto";
					mail($para,$asunto,$mensaje,$de);
					$para2 = $datos_cliente['Email'];
					$de2 = "From:"."Cristian Desginer Sistema de Pagos y anticipos<cristianrocker93@gmail.com>";
					$asunto2 = "Notificación";
					$mensaje2 = "Muchas gracias su abono será revisado por nuestro personal";	
				    mail($para2,$asunto2,$mensaje2,$de2);
					
			  }
			 
					
			  
	}
  else {
		echo "Ruta mala";
	  }
	  
	  
	  
		  }
	
		  else "Error al logearse";
		  //cierra tercer if anidado
	}
	else echo "Error al concectarse";
	//Cierra ssegundo if anidado
	}
	///ELSE PRIMER IF
	else {
		echo "El número de petición es incorrecto";
		}
		ftp_close($conn_id);
}

?>
</form>
</body>
</html>