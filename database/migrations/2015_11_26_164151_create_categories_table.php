<?php

use database\DbTruncator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->uniquie();
			$table->timestamps();

			$table->integer('author_id')->unsigned()->index();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categories', function (Blueprint $table)
		{
			$table->dropForeign('categories_author_id_foreign');
			$table->dropIndex('categories_author_id_index');
			$table->removeColumn('author_id');
		});
		
		Schema::drop('categories');
	}
}
