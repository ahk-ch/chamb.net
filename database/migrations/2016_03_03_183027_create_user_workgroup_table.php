<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorkgroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_workgroup', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('user_workgroup', function (Blueprint $table) {
            $table->dropForeign('user_workgroup_user_id_foreign');
            $table->dropIndex('user_workgroup_user_id_index');
            $table->removeColumn('user_id');

            $table->dropForeign('user_workgroup_workgroup_id_foreign');
            $table->dropIndex('user_workgroup_workgroup_id_index');
            $table->removeColumn('workgroup_id');
        });

        Schema::drop('user_workgroup');
    }
}
