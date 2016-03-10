<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('decisions', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('description');
			$table->timestamps();

			$table->date('decision_date')->nullable();

			$table->integer('creator_id')->unsigned()->index();
			$table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
			$table->integer('company_id')->unsigned()->index();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict')->onUpdate('cascade');
			$table->integer('file_id')->unsigned()->index()->nullable();
			$table->foreign('file_id')->references('id')->on('files')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('decisions', function (Blueprint $table)
		{
			$table->dropForeign('decisions_creator_id_foreign');
			$table->dropIndex('decisions_creator_id_index');
			$table->removeColumn('creator_id');

			$table->dropForeign('decisions_company_id_foreign');
			$table->dropIndex('decisions_company_id_index');
			$table->removeColumn('company_id');

			$table->dropForeign('decisions_file_id_foreign');
			$table->dropIndex('decisions_file_id_index');
			$table->removeColumn('file_id');
		});
		
		Schema::drop('decisions');
	}
}
