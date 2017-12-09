<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInflowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('inflow', function(Blueprint $table)
		{
			$table->foreign('id_child', 'FK_inflow_id_child')->references('id_child')->on('child')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('inflow', function(Blueprint $table)
		{
			$table->dropForeign('FK_inflow_id_child');
		});
	}

}
