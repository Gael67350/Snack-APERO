<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id_user', true);
			$table->string('email', 50);
			$table->string('phone', 13);
			$table->string('password', 255);
			$table->integer('privilege');
			$table->string('remember_token', 100)->nullable();
		});

        // Add admin account with email "admin@example.com" and password "admin"
        DB::table('user')->insert(['email' => 'admin@example.com', 'phone' => '0000000000', 'password' => Hash::make('admin'), 'privilege' => 0]);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
