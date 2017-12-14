<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('child', function(Blueprint $table)
		{
			$table->integer('id_child', true);
			$table->string('lastName', 25);
			$table->string('name', 25);
			$table->date('birthDate');
			$table->integer('id_category')->index('FK_child_id_category');
			$table->integer('id_user')->index('FK_child_id_user');
			$table->index(['lastName','name'], 'lastName');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('child');
	}

}
