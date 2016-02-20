<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->string('logo_path');
			$table->text('description');
			$table->text('focus');
			$table->string('business_leader');
			$table->string('address');
			$table->string('email');
			$table->string('phone_number');
			$table->timestamps();

			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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
			$table->dropForeign('companies_user_id_foreign');
			$table->dropIndex('companies_user_id_index');
			$table->removeColumn('user_id');
		});

		Schema::drop('companies');
	}
}
