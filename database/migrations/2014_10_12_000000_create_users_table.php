<?php

use App\Ahk\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('avatar_url')->nullable();
			$table->string('password', 60);
			$table->boolean('verified')->default(false);
			$table->string('token')->nullable();
			$table->string(User::SLUG)->unique();
			$table->string(User::RECOVERY_TOKEN)->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
