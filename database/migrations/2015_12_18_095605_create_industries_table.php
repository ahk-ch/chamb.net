<?php

use App\Ahk\Industry;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('industries', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('fontawesome')->unique()->nullable();
			$table->string(Industry::SLUG)->unique();
			$table->timestamps();

			$table->integer('author_id')->unsigned()->index()->nullable();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
		});
		
		Industry::create(['name' => 'Health', 'fontawesome' => 'fa fa-heartbeat']);
		Industry::create(['name' => 'Logistics', 'fontawesome' => 'fa fa-bar-chart']);
		Industry::create(['name' => 'Energy', 'fontawesome' => 'fa fa-sun-o']);
		Industry::create(['name' => 'Trade', 'fontawesome' => 'fa fa-exchange']);
		Industry::create(['name' => 'Law', 'fontawesome' => 'fa fa-university']);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('industries', function (Blueprint $table)
		{
			$table->dropForeign('industries_author_id_foreign');
			$table->dropIndex('industries_author_id_index');
			$table->removeColumn('author_id');
		});

		Schema::drop('industries');
	}
}
