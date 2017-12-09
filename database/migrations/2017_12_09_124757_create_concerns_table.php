<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConcernsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('concerns', function(Blueprint $table)
		{
			$table->integer('quantity');
			$table->integer('id_consumption');
			$table->integer('id_product')->index('FK_concerns_id_product');
			$table->primary(['id_consumption','id_product']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('concerns');
	}

}
