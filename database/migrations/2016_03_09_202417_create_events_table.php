<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->text('description');
			$table->timestamps();

			$table->integer('eventable_id')->nullable();
			$table->string('eventable_type')->nullable();

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
		Schema::table('events', function (Blueprint $table)
		{
			$table->dropForeign('events_creator_id_foreign');
			$table->dropIndex('events_creator_id_index');
			$table->removeColumn('creator_id');
		});

		Schema::drop('events');
	}
}
