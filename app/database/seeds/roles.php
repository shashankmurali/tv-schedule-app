<?php 

class RolesTableSeeder extends Seeder {


  public function run()
  {
	User::create(array('name'=>'user'));
	User::create(array('name'=>'administrator'));	

  }


}
