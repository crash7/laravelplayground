<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHaveRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users_have_roles', function (Blueprint $table) {
			$table->integer('users_id')->unsigned();
			$table->integer('roles_id')->unsigned();
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');;
			$table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');;
		});
		
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users_have_roles');
	
	}


}
