<?php

use App\Ahk\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('publish')->nullable()->default(false);
            $table->string('source')->nullable();
            $table->mediumText('description');
            $table->longText('content');
            $table->integer('view_count')->default(0);
            $table->string(Article::SLUG)->unique();
            $table->timestamps();

            $table->integer('author_id')->unsigned()->index();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_author_id_foreign');
            $table->dropIndex('articles_author_id_index');
            $table->removeColumn('author_id');
        });

        Schema::drop('articles');
    }
}
