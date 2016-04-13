<?php

use database\DbTruncator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('article_tag', function (Blueprint $table) {
            $table->dropForeign('article_tag_tag_id_foreign');
            $table->dropIndex('article_tag_tag_id_index');
            $table->removeColumn('tag_id');
        });

        Schema::drop('article_tag');
    }
}
