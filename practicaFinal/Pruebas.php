<html>
<head>
<title>Pruebas</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>


<body background="imagenes/2.jpg" style="background-attachment: fixed">
<img src="imagenes/logo.png" alt="logo" width="283" height="157">
<div align="center"><br>
  <br>
  <br>
  <h1><b>Registro de pruebas</b></h1>
  <br>
  <br>
  <form action="validar.php" method="post" enctype="multipart/form-data">
    <label><strong><b> Numero de solicitud</b></strong>
</label>
<br>
  <input type="text" name="numSolicitud" required>  
  <br>
<label>
	<strong> Seleccione archivo a cargar</strong>
</label>
<br>
<input type="file" name="archivo">
<br>
    
    <br>
	<input type="image" src="imagenes/send.gif" name="cargar">
	<br>
  </form>
</div>
<br>
    
</body>
</html>