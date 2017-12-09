<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToComposedofTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('composedof', function(Blueprint $table)
		{
			$table->foreign('id_product', 'FK_composedOf_id_product')->references('id_product')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_product_1', 'FK_composedOf_id_product_1')->references('id_product')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('composedof', function(Blueprint $table)
		{
			$table->dropForeign('FK_composedOf_id_product');
			$table->dropForeign('FK_composedOf_id_product_1');
		});
	}

}
