<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComposedofTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('composedof', function(Blueprint $table)
		{
			$table->float('quantity', 10, 0);
			$table->integer('id_product');
			$table->integer('id_product_1')->index('FK_composedOf_id_product_1');
			$table->primary(['id_product','id_product_1']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('composedof');
	}

}
