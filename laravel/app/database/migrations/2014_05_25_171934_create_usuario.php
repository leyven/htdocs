<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("usuario",function($tabla){ 
			$tabla->create();
			$tabla->increments("idUsuarioCurso");
			$tabla->string("nombreEstudiante");
			$tabla->string("passwordEstudiante");
			$tabla->string("correoEstudiante");

		});
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
