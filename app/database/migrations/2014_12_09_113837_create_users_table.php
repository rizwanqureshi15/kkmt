<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('first_name', 64);
			$table->string('last_name', 64);
			$table->string('username', 64);
			$table->string('password', 64);
			$table->string('email');
			$table->integer('mobile_no');
			$table->text('address');
			$table->string('role', 16);
			$table->boolean('is_active')->default(true);
			$table->string('image');
			$table->string('remember_token', 64);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
