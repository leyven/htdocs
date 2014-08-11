<html>
<head><title>Registro descargas</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<body background="imagenes/2.jpg" style="background-attachment: fixed">
<img src="imagenes/logo.png" alt="logo" width="283" height="157">
<br><br>


<h1>Registro de Descargas</h1>
<br><br>

<form action="validarRegistroDescargas.php" method="post" enctype="multipart/form-data">
<label><b>Numero de Solicitud</b></label><br>
<input type="text" name="numSolic" required>
<br><br>
<input type="file" name="archivo">
<br><br>
<input type="submit" name="subir" value="Ingresar">
<br><br>
<a href="indexGerencia.php">Regresar</a>
</form>


</body>
</html>