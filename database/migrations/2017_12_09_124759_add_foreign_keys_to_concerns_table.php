<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConcernsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('concerns', function(Blueprint $table)
		{
			$table->foreign('id_consumption', 'FK_concerns_id_consumption')->references('id_consumption')->on('consumption')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_product', 'FK_concerns_id_product')->references('id_product')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('concerns', function(Blueprint $table)
		{
			$table->dropForeign('FK_concerns_id_consumption');
			$table->dropForeign('FK_concerns_id_product');
		});
	}

}
