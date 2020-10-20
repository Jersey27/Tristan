<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectsTableAndParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->timestamps();
            $table->text('titre');
            $table->text('short_description');
            $table->text('image');
            $table->longtext('description');
        });

        Schema::create('paragraphs', function (Blueprint $table) {
            $table->id('paragraph_id');
            $table->timestamps();
            $table->foreignId('project_id');
            $table->text('titre');
            $table->text('image');
            $table->longtext('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('paragraphs');
    }
}
