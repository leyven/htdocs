<?php 
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

	//obtener todos los correos
	$obtenerCorreo="SELECT Email FROM usuario WHERE idPeticion=".$idPeticionQueEscribeElUsuarioEnElTextField;	
	
		$a=mysql_query($obtenerCorreo);




	$EstaSegundaMadre= mysql_num_rows($a);
	if($EstaSegundaMadre>=1){
		echo "Si existe un correo con ese numero de peticion";
	}
	else{
		echo "No existe ese numero";
	}


?>