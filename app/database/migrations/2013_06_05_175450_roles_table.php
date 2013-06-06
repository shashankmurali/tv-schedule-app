<?php

use Illuminate\Database\Migrations\Migration;

class RolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function($t) {
                        $t->increments('id');
                        $t->string('name', 40)->unique();
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles');
	}

}
