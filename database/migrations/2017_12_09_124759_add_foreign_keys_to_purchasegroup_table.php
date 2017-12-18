<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchasegroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchasegroup', function(Blueprint $table)
		{
			$table->foreign('id_user', 'FK_purchasegroup_id_user')->references('id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchasegroup', function(Blueprint $table)
		{
			$table->dropForeign('FK_purchasegroup_id_user');
		});
	}

}
