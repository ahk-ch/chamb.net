<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsWorkgroupsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors_workgroups', function (Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('author_id')->unsigned()->index();
			$table->foreign('author_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
			$table->integer('workgroup_id')->unsigned()->index();
			$table->foreign('workgroup_id')->references('id')->on('workgroups')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('authors_workgroups', function (Blueprint $table)
		{
			$table->dropForeign('authors_workgroups_author_id_foreign');
			$table->dropIndex('authors_workgroups_author_id_index');
			$table->removeColumn('author_id');

			$table->dropForeign('authors_workgroups_workgroup_id_foreign');
			$table->dropIndex('authors_workgroups_workgroup_id_index');
			$table->removeColumn('workgroup_id');
		});
		
		Schema::drop('authors_workgroups');
	}
}
