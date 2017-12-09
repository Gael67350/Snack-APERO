<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConsumptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('consumption', function(Blueprint $table)
		{
			$table->foreign('id_child', 'FK_consumption_id_child')->references('id_child')->on('child')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('consumption', function(Blueprint $table)
		{
			$table->dropForeign('FK_consumption_id_child');
		});
	}

}
