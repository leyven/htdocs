<html>
<head></head>

<body>

	<form name="enviador" method="post" action="recibe.php" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000">
		Archivo: <input type="file" name="archivo">
		<br>
		<input type="submit" value="subir" name="subir">
	</form>
</body>
</html>