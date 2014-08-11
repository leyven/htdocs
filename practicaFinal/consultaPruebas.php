<html>
<head>
<title>Connsulta de Pruebas</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>


<body background="imagenes/2.jpg" style="background-attachment: fixed">
<img src="imagenes/logo.png" alt="logo" width="283" height="157">
<div align="center"><br>
  <br>
  <br>
  <h1><b>Consulta de pruebas</b></h1>
  <br>
  <br>
  <form action="validarConsultaPruebas.php" method="post" enctype="multipart/form-data">
    <label><strong><b> Numero de solicitud</b></strong>
</label>
<br>
  <input type="text" name="numSolicitud" required>  
  <br>
<label>
	<strong> Preferencias</strong>
</label>
<br>


<br>
    
    <br>
	<input type="submit" name="notificar" value="notificar">
	<br>
  </form>
</div>
<br>
    <a href="agenciaIndex.php">Regresar</a>


<?php

include("conexion.php");


$conexx=mysql_connect($host, $user, $pass)or die("Error al conectarse al servidor");
mysql_select_db($baseDatos, $conexx) or die("No se ha podido acceder a la base de datos");
$obtenerNumSolicitud=$_POST['numSolicitud'];

$obtenerSol="SELECT * FROM solicitud WHERE num_solicitud=$obtenerNumSolicitud";
$querycli=mysql_query($obtenerSol);
$checarAray=mysql_fetch_array($querycli);

$us="SELECT * FROM usuario WHERE id_usuario=".$checarAray['id_usuario'];
$a=mysql_query($us);
$info_a=mysql_fetch_array($a);

$ver=@mysql_num_rows($querycli);

if(isset($_POST['notificar']))
{
  
  
  if($ver>0)
  {
  
  $rutaEndondeestalacarpeta="www.programacionweb.virrueta/Avenged/PruebaCesar/Pedidos/".$_POST['numero_solicitud']."/evidencia";
  $conn_id=@ftp_connect($hostFTP,$port);
    
    if($conn_id){
  if(@ftp_login($conn_id,$user,$password))
    {
      $co=0;
    $archivos = ftp_nlist($conn_id,$rutaEndondeestalacarpeta);
        foreach($archivos as $carpeta=>$evidencias){
          if($carpeta == 0 or $carpeta== 1 ){}
          else {
            $co++;
          $url = "prueba_cliente/".$_POST['numero_solicitud']."/evidencia/".$v;
        
           ?> 
                      <br>
                      <label style="alignment-adjust:central"> <?   echo "Opcion: ".$co;?> </label><br>
                     <img style="alignment-adjust:central" src=<? echo $url?> name="imagen" alt="100" width="100"  ></img>
                     <?
          }
        }
      }
    
    else {
      echo "Error";
      } 
    }
    else {
       echo "No hay respuesta por parte del servidor";
      }
    $counter = 0;
    foreach($archivos as $carpeta=>$evidencias)
    {
      if($carpeta == 0 or $carpeta==1){}
      else {
        $counter++;
        $nombres = $counter;
                    ?><br>
            <label> 

      <? echo "Prueba ".$nombres?></label>
      <input type="checkbox" name="prueba[]" value="<? echo $evidencias?>"/>
      <?  
     }
 }
      
      ?>
      <br>
            <h1>Seccion de Observaciones</h1>
      <br></br>
            <textarea name="observacionUsuario"></textarea>
            <br></br>
                        <input type="submit" value="Notificar" name="notificar"><?
    }else {
    
    echo "El registro no existe ";
    }
  }

?>
<?

if(isset($_POST['notificar'])){
  $cadena= "";
  $opcionesEscogidas=$_POST['prueba'];
  for($j=0; $j<count($opcionesEscogidas); $j++){
    $aux = $j+1;
  $send[] = "Opcion ".$aux." ".$opcionesEscogidas[$j]." www.programacionweb.virrueta.org/Avenged/PruebaCesar/Pedidos/".$_POST['numero']."/Pruebas/".$opcionesEscogidas[$j]."\n";
  
    
    ?>
         <a href="Pedidos/<? echo $_POST['numero'] ?>/Pruebas/<? echo $opcionesEscogidas[$j] ?>" download>Prueba</a>
    <br>
    <?
  }
    //echo "La cadena queda asi: ".$cadena;
    
          $cadena = implode($send,',');
          $para2 =  "notificacionespruebas@virrueta.org";
          $de2 = "From: Administrador <admon@admon.com>";
          $asunto2 = "Solicitud: ".$_POST['numero'];
          $mensaje2 ="El cliente ya ha escogido sus archivos, opciones escogidas: "
          .$cadena."\n Comentarios: ".$_POST['observacionUsuario'];
          $ver = mail($para2,$asunto2,$mensaje2,$de2);
    
    ?> 
<?php     
  
}

?>
</body>
</html>