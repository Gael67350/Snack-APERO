<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInflowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inflow', function(Blueprint $table)
		{
			$table->integer('id_inflow', true);
			$table->date('transactionDate');
			$table->float('amount', 10, 0);
			$table->integer('id_child')->index('FK_inflow_id_child');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inflow');
	}

}
