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
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email',60)->nullable();
			$table->string('phone_number',10)->unique();
			$table->string('password',60);
			$table->string('password_temp',60);
			$table->string('code',60);
			$table->string('firstname',60);
			$table->string('lastname',60);
			$table->string('national_id',8)->nullable()->unique();
			$table->boolean('activate');
			$table->boolean('admin');
			$table->string('remember_token',60);


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
