<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMadebyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('madeby', function(Blueprint $table)
		{
			$table->integer('id_purchase');
			$table->integer('id_user')->index('FK_madeBy_id_user');
			$table->primary(['id_purchase','id_user']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('madeby');
	}

}
