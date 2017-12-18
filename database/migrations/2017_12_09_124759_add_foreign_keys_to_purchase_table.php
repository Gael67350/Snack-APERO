<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase', function(Blueprint $table)
		{
			$table->foreign('id_product', 'FK_purchase_id_product')->references('id_product')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_purchase', 'FK_purchase_id_purchase')->references('id_purchase')->on('purchasegroup')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchase', function(Blueprint $table)
		{
			$table->dropForeign('FK_purchase_id_product');
			$table->dropForeign('FK_purchase_id_purchase');
		});
	}

}
