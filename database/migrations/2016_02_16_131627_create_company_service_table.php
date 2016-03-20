<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_service', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('offers')->default(false);
            $table->boolean('requires')->default(false);
            $table->timestamps();

            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_service', function (Blueprint $table) {
            $table->dropForeign('company_service_company_id_foreign');
            $table->dropIndex('company_service_company_id_index');
            $table->removeColumn('company_id');

            $table->dropForeign('company_service_service_id_foreign');
            $table->dropIndex('company_service_service_id_index');
            $table->removeColumn('service_id');
        });

        Schema::drop('company_service');
    }
}
