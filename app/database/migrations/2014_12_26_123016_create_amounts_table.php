<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amounts', function($table){
			$table->increments('id');
			$table->integer('amount');
			$table->integer('member_id')->unsigned();
			$table->foreign('member_id')->references('id')->on('members');
			$table->string('receipt_no', 16);
			$table->date('date');
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
		Schema::drop('amounts');
	}

}
