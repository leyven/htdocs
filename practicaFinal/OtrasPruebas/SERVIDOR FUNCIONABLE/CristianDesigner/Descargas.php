<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Descargas</title>
</head>

<body>
<form action="Descargas.php" method="post">
<label> Numero de Solicitud: </label>
<input type="number" name="numero_solicitud"/>
<input type="submit" name="visualizar" value="Visualizar"/>

</form>
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
	$ruta="CristianDesigner/Pedidos/".$_POST['numero_solicitud']."/Entregable";
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
					$url = "Pedidos/".$_POST['numero_solicitud']."/Entregable/".$v;
				
					 ?> 
                      <br/>
                     
                      <br/>
                      <label>Archivo: <? echo $v?></label>
                      <a href="<? echo $url?>" download> Clic aquí para descargar</a>
                     <br/>
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
	}
}
	?>


</body>
</html>