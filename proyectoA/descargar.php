<?php
    $extensiones = array('pdf','jpg','png','doc','jpeg','gif');
    $f = "beer.jpg";
    if(strpos($f,"/")!==false){
        die("No puedes navegar por otros directorios");
    }
    $ftmp = explode(".",$f);
    $fExt = strtolower($ftmp[count($ftmp)-1]);

    if(!in_array($fExt,$extensiones)){
        die("<b>ERROR!</b> no es posible descargar archivos con la extension $fExt");
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$f\"\n");
    $fp=fopen("$f", "r");
    fpassthru($fp);
?>