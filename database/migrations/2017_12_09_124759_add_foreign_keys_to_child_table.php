<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChildTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('child', function(Blueprint $table)
		{
			$table->foreign('id_category', 'FK_child_id_category')->references('id_category')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_user', 'FK_child_id_user')->references('id_user')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('child', function(Blueprint $table)
		{
			$table->dropForeign('FK_child_id_category');
			$table->dropForeign('FK_child_id_user');
		});
	}

}
