<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsumptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consumption', function(Blueprint $table)
		{
			$table->integer('id_consumption', true);
			$table->date('transactionDate');
			$table->integer('id_child')->index('FK_consumption_id_child');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consumption');
	}

}
