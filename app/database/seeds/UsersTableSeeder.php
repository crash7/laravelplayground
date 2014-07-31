<?php
class UsersTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete(); // FIXME can't use truncate, FK issue
		
		for($i = 0; $i < 10; $i ++) {
			User::create(array(
				'name' => "name_for_user_$i",
				'username' => "user_$i",
				'password' => Hash::make("$i") 
			));
		}
	
	}


}

?>