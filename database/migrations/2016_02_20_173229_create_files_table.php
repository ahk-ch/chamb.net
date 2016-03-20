<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('client_original_name');
            $table->string('path');
            $table->text('description')->nullable();
            $table->timestamps();

            // See https://laravel.com/docs/5.2/eloquent-relationships#polymorphic-relations
            $table->integer('fileable_id')->nullable();
            $table->string('fileable_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}
