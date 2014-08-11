<html>
<head><title>Pago o anticipos</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<body background="imagenes/2.jpg" style="background-attachment: fixed">

<img src="imagenes/logo.png" alt="logo" width="283" height="157">
<h1>Registro de pagos</h1>
  <label>
  <h1>&nbsp;</h1>
  Numero de solicitud</label>
	<input type="text" name="NumSolicitud">
	<br>
  <label>Anticipo</label><input type="radio" value=0 name="opciones">
  <label>Pago Total</label><input type="radio" value=1 name="opciones">
  <br>
  <label>Comprobante: </label><input type="file" name="archivosPago">
  <br>
<input type="submit" name="ingres" value="Ingresar">
<br>
<br>
<br>
	<a href="agenciaIndex.php">Regresar</a>
</body>
</html>