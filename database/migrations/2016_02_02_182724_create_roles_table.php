<?php

use App\Ahk\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateRolesTable.
 */
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Role::create(['name' => Role::COMPANY_REPRESENTATIVE_ROLE]);
        Role::create(['name' => Role::AUTHOR_ROLE]);
        Role::create(['name' => Role::ADMINISTRATOR_ROLE]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
