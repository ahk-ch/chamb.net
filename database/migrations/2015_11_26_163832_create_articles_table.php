<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->boolean('published');
			$table->string('source');
			$table->mediumText('description');
			$table->longText('content');
			$table->timestamps();

			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}
}
