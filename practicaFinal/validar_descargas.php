<html>
<head>

</head>
<body>
<?php 
//$tamano =$_FILES["archivo"]['size'];
//$tipo = $_FILES["archivo"]['type'];


$host="localhost";
$user="root";
$pass="1234";
$conexion= mysql_connect($host, $user, $pass) or die("Error al conectarse a la base de datos");
$DatBa= mysql_select_db("agenciapublicidad", $conexion) or die("No se pudo encontrar la base de datos");
$sql=mysql_query($DatBa);


//Ingreso el numero de solicitud, verifico si el idPeticion de la solicitudi
//Coincide con la tabla usuario y obtengo el correo electronico
//Solo requiero obtener el correo del usuario
//Numero de registro
//GUARDO EL IDPETICION INGRESADO POR EL USUARIO
$idPeticionQueEscribeElUsuarioEnElTextField=$_POST['numSolicitud'];
//echo $idPeticionQueEscribeElUsuarioEnElTextField;


	//obtener todos los correos
	$obtenerid_usuario="SELECT id_usuario FROM solicitud WHERE num_solicitud=".$idPeticionQueEscribeElUsuarioEnElTextField;	
	$b=mysql_query($obtenerid_usuario);

	$obtenerCorreo="SELECT Email FROM usuario WHERE id_usuario=".$b;
	$a=mysql_query($obtenerCorreo);

	$EstaSegundacosa= @mysql_num_rows($a);
	if($EstaSegundacosa>=1){
		?>
		<br>
		<?
		echo "Si existe un correo con ese numero de peticion";
		$archivo =$_FILES["archivo"]['name'];
		$destino ="/Pruebas_cliente/".$archivo;
		//tmp_nanme =ruta del archivo en donde se quiere guardar
		copy($_FILES['archivo']['tmp_name'],$destino);
		echo "Archivo guardado exitosamente";
	}
	else{
		?>
		<br>
		<?
		echo "No existe ese numero de peticion";
	}

?>

</body>
