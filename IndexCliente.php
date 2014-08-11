<html>
<head>
	<script type="text/javascript" src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/Script.js"></script>
	<link rel="stylesheet" href="Estilo/Style.css">
</head> 
<body> 
<input type="submit" id="Descargas" value="descargas"/>
<input type="submit" id="Pagos" value="pagos"/>
<input type="submit" id="Pruebas" value="pruebas">
<br/><br/><br/><br/><br/><br/>
<h>Registro de solicitud</h><br/>
<input id="nuevo"type="submit"name="nuevo" value="cliente nuevo">
<input id="frecuente"type="submit"name="frecuente" value="cliente frecuente">

<div id="ClienteNuevo">
	<form action="InsertarRegistros.php" enctype="multipart/form-data" method="post">
		<p>Nuevo cliente</p>
		Nombre: <input type="text" name="NombreCliente"/>	  <br/>
		E-mail :  <input type="text" name="EmailCliente"/>      <br/>
		Telefono: <input type="text" name="TelefonoCliente"/> <br/>
		Descripcion: <textarea name="DescripcionCliente"autofocus >Aqui puedes poner tus comentarios</textarea> <br/>
		Archivos: <input type="file" name="archivo" multiple required/>  <br/>

 		<input type="submit" name="" value="Solicitar"/>
	</form>
</div>

<div id="ClienteFrecuente">
<p> Cliente frecuente</p>
	<form>
		Correo: <input type="text" name="EmailCliente"/>  <br/>
		Descripcion: <input type="textbox" name="mensaje"/> <br/>
		Archivos: <input type="file" name="archivo[]" multiple required/>  <br/>
		<input type="submit" name="Verificar" value="Verificar"/>
	</form>
</div>

<div id="RegistroPagos">
<p>Registro de Pagos</p>
	<form action="pagos.php" method="post">
		Numero de solicitud: <input type="text" name="NumeroSolicitud"/>  <br/>
		<input type="radio" name="pago" value="0">anticipo
		<input type="radio" name="pago" value="1">pago total <br/>
		comprobante: <input type="file" name="archivo[]" multiple required/>  <br/>
		<input type="submit" name="guardarregistro" value="Guardar"/>
	</form>
</div>

<div id="ConsultaPruebas">
<p>Consulta de pruebas</p>
	<form action="ver_dir.php" method="post">
		Numero de solicitud: <input type="text" name="NumeroSolicitud"/>  <br/>
		Archivos: <br/>
		Preferencias <br/>
		Observaciones: <textarea autofocus >Aqui puedes poner tus comentarios</textarea> <br/>
		<input type="submit" name="save" value="Guardar"/>
	</form>
</div>

<div id="RegistroDescargas">
<p>Registro de descargas</p>
		<form action="MostrarDescargas.php" method="Post">
		Numero de solicitud: <input type="text" name="NumeroSolicitud"/>  <br/>
		<input type="submit" name="visualizar" value="visualizar"/>
		
		</form>
</div>
</body>

</html>

