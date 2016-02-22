<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function (Blueprint $table)
		{
			$table->integer('logo_id')->unsigned()->index()->nullable();
			$table->foreign('logo_id')->references('id')->on('files')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function (Blueprint $table)
		{
			$table->dropForeign('companies_logo_id_foreign');
			$table->dropIndex('companies_logo_id_index');
			$table->removeColumn('logo_id');
		});
	}
}
