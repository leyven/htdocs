<?php  

/**
* 
*/
class RegistroController extends BaseController
{
	public function vistaRegistro()
	{
		return View::make("registro");
	}
	public function registrar(){

		$nombre =$_POST["nombre"];
		$correo =$_POST["Correo"];
		$pass =$_POST["pass"];
		Session::put('nombre',$nombre);
		try{
			$id =DB::table('usuario')->insertGetId(array(

			'nombreEstudiante'=>$nombre,
			'passwordEstudiante'=>$pass,
			'correoEstudiante'=>$correo
			
			)
		);
			return Redirect::to("inicio");
		}
		catch(ErrorException $e)
		{
			return View::make("login");
		}
		
		
	}
}
?>