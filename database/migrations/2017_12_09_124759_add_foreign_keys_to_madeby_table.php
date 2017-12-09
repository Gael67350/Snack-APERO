<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMadebyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('madeby', function(Blueprint $table)
		{
			$table->foreign('id_purchase', 'FK_madeBy_id_purchase')->references('id_purchase')->on('purchasegroup')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_user', 'FK_madeBy_id_user')->references('id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('madeby', function(Blueprint $table)
		{
			$table->dropForeign('FK_madeBy_id_purchase');
			$table->dropForeign('FK_madeBy_id_user');
		});
	}

}
