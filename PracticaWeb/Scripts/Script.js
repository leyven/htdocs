var x;
x=$(document);
x.ready(inicializarEventos);


function inicializarEventos()
{
 accionclientes();
  
}



function esconder()
{
	var x=$("#ClienteNuevo");
	x.hide();
	x=$("#ClienteFrecuente");
	x.hide();
	x=$("#RegistroPagos");
	x.hide();
	x=$("#ConsultaPruebas");
	x.hide();
	x=$("#RegistroDescargas");
	x.hide();
}
function mostrarnuevo()
{
	esconder();
	var x=$("#ClienteNuevo");
	x.show("slow");
	
}
function mostrarfrecuente()
{
	esconder();
	var x=$("#ClienteFrecuente");
	x.show("slow");
	
}
function mostrardescargas()
{
	esconder();
	var x=$("#RegistroDescargas");
	x.show("slow");	
}
function mostrarpagos()
{
	esconder();
	var x=$("#RegistroPagos");
	x.show("slow");	
}
function mostrarpruebas()
{
	esconder();
	var x=$("#ConsultaPruebas");
	x.show("slow");	
}
function accionclientes()
{
	esconder();
 var x=$("#nuevo");
 x.click(mostrarnuevo);
 x=$("#frecuente");
 x.click(mostrarfrecuente);
 x=$("#Pruebas");
 x.click(mostrarpruebas);
 x=$("#Pagos");
 x.click(mostrarpagos);
  x=$("#Descargas");
 x.click(mostrardescargas);
 
}