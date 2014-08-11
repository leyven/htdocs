function abrir(){
	window.open('Pruebas.php','Seccion de Pruebas', 'width=340, height=300');
}

function mostrarNuevo(){
	ElQueSeMuestra=document.getElementById('clientenuevo').style.display='block';
	elQueSeOculta=document.getElementById('clientefrecuente').style.display='none';
}

function mostrarFrecuente(){
	ElQueSeMuestra=document.getElementById('clientefrecuente').style.display='block';
	elQueSeOculta=document.getElementById('clientenuevo').style.display='none';
	
}
