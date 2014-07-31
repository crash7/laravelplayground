<?php
class RolesTableSeeder extends Seeder {

	public function run() {
		DB::table('roles')->delete(); // FIXME can't use truncate, FK issue
		
		// FIXME use batch inserts
		Role::create(array(
			'name' => "Admin" 
		));
		Role::create(array(
			'name' => "DataEntry" 
		));
		Role::create(array(
			'name' => "Normal" 
		));
	
	}


}

?>