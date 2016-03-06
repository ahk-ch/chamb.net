<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkgroupsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workgroups', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('description');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->string('slug')->unique();
			$table->timestamps();

			$table->integer('creator_id')->unsigned()->index();
			$table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workgroups', function (Blueprint $table) {
			$table->dropForeign('workgroups_creator_id_foreign');
			$table->dropIndex('workgroups_creator_id_index');
			$table->removeColumn('creator_id');
		});

		Schema::drop('workgroups');
	}
}
