<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Consulta de Pruebas</title>
</head>

<body>
<form action="consulta_pruebas.php?numero=<? echo $_POST['numero_solicitud'];?>" method="post">
<!--  <form action="consulta_pruebas.php" method="post">  -->
<label> Numero de Solicitud: </label>
<input type="number" name="numero_solicitud"/>
<input type="submit" name="visualizar" value="Visualizar"/>


<?
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
if(isset($_POST['visualizar']))
{
	
	
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
			$co=0;
		$archivos = ftp_nlist($conn_id,$ruta);
				foreach($archivos as $c=>$v){
					if($c == 0 or $c== 1 ){}
					else {
						$co++;
					$url = "Pedidos/".$_POST['numero_solicitud']."/Pruebas/".$v;
				
					 ?> 
                      <br/>
                      <label style="alignment-adjust:central"> <? 	echo "Prueba: ".$co;?> </label>
                      <br/>
                     <img style="alignment-adjust:central" src=<? echo $url?> name="imagen" alt="100" width="100"  ></img>
                     <?
					}
				}
			}
		
		else {
			echo "No se pudo logear";
			}	
		}
		else {
			"No se pudo conectar al servidor";
			}
		$cont = 0;
		foreach($archivos as $c=>$v)
		{
			if($c == 0 or $c==1){}
			else {
				$cont++;
				$name = /*"Prueba".*/$cont;
										?>
            <br></br>
            <label> <? echo "Prueba ".$name?></label>
			<input type="checkbox" name="prueba[]" value="<? echo $v?>"/>
			
            
			<?	
			}
			}
			
			?>
			<br>
            <label>Observaciones</label>
			<br></br>
            <textarea name="observaciones"></textarea>
            <br></br>
                        <input type="submit" value="Notificar" name="notificar">
            
			<?
		}
	
	else {
		
		echo "No existe un registro con ese numero de solicitud compruebe que se
		haya ingresado correctamente ";
		}
	}

?>


<?

if(isset($_POST['notificar'])){
	$cadena= "";
	$opcionesEscogidas=$_POST['prueba'];
	for($j=0; $j<count($opcionesEscogidas); $j++){
		$aux = $j+1;
	$send[] = "Opcion ".$aux." ".$opcionesEscogidas[$j]." www.programacionweb.virrueta.org/Avenged/CristianDesigner/Pedidos/".$_GET['numero']."/Pruebas/".$opcionesEscogidas[$j]."\n";
	
		
		?>
         <a href="Pedidos/<? echo $_GET['numero'] ?>/Pruebas/<? echo $opcionesEscogidas[$j] ?>" download>Prueba</a>
		<br>
		<?
	}
		//echo "La cadena queda asi: ".$cadena;
		
					$cadena = implode($send,',');
					$para =  "notificacionespruebas@virrueta.org";
					$de = "From: Cristian Designer <cristianrocker93@gmail.com>";
					$asunto = "Atender Solicitud: ".$_GET['numero'];
					$mensaje ="Los bocetos ya fueron elejidos por el cliente se lista los el nombre de los archivos que el usuario elijio: "
					.$cadena."\n Comentarios del cliente: ".$_POST['observaciones'];
					$ver = mail($para,$asunto,$mensaje,$de);
				
	
}


?>
</form>
</body>
</html>