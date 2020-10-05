<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlogArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->primary('id');
            $table->string('name',80);
            $table->longtext('text');

        });


        Schema::create('Imageblog', function(Blueprint $table)
        {
            $table->increments('id');
            $table->primary('id');
            $table->string('title',30);
            $table->string('path',150);
            $table->integer('blog_id')->unsigned();
            $table->foreign('blog_id')
                  ->references('id')
                  ->on('blog')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Imageblog', function(Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
        });
        Schema::drop('Imageblog');

        Schema::drop('blog');
        }
}
