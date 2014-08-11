<?php
  

 function descargar ($ruta){
// Definimos el nombre de archivo a descargar.

 $filename = "nombredearchivo.jpg";
 // Ahora guardamos otra variable con la ruta del archivo
 $file = $ruta;
 // Aquí, establecemos la cabecera del documento
 header("Content-Description: Descargar imagen");
 header("Content-Disposition: attachment; filename=$filename");
 header("Content-Type: application/force-download");
 header("Content-Length: " . filesize($file));
 header("Content-Transfer-Encoding: binary");
 readfile($file);
 }
 $_GET['ruta'];
    $_GET['index'];
 descargar($ruta);
?>