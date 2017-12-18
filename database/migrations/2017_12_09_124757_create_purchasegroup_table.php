<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasegroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchasegroup', function(Blueprint $table)
		{
			$table->integer('id_purchase', true);
			$table->date('transactionDate');
			$table->float('totalPrice', 10, 0);
            $table->integer('id_user')->index('FK_purchasegroup_id_user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchasegroup');
	}

}
