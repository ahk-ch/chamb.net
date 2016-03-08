<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThumbnailToArticlesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articles', function (Blueprint $table)
		{
			$table->integer('thumbnail_id')->unsigned()->index()->nullable();
			$table->foreign('thumbnail_id')->references('id')->on('files')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('articles', function (Blueprint $table)
		{
			$table->dropForeign('articles_thumbnail_id_foreign');
			$table->dropIndex('articles_thumbnail_id_index');
			$table->removeColumn('thumbnail_id');
		});
	}
}
