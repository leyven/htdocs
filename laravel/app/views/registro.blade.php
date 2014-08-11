<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Registro</h1>
<form action="{{(url('insercion'))}}" method="post">
	<input type="text" placeholder="Nombre" name="nombre" required>
	<input type="text" placeholder="Correo" name="Correo" required>
	<input type= "password" placeholder="Contraseña" name="pass" required>
	<input type= "submit" value="Enviar">
</form>
</body>
</html>