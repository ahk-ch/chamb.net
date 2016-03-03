<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriesWorkgroupsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('industries_workgroups', function (Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('industry_id')->unsigned()->index();
			$table->foreign('industry_id')->references('id')->on('industries')->onDelete('restrict')->onUpdate('cascade');
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
		Schema::table('industries_workgroups', function (Blueprint $table)
		{
			$table->dropForeign('industries_workgroups_industry_id_foreign');
			$table->dropIndex('industries_workgroups_industry_id_index');
			$table->removeColumn('industry_id');
			
			$table->dropForeign('industries_workgroups_workgroup_id_foreign');
			$table->dropIndex('industries_workgroups_workgroup_id_index');
			$table->removeColumn('workgroup_id');
		});

		Schema::drop('industries_workgroups');
	}
}
