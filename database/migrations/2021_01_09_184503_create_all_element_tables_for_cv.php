<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllElementTablesForCv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('titre');
            $table->string('date');
            $table->string('company');
            $table->longtext('description');
            $table->integer('place');
            $table->boolean('visible')->default(false);
        });
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('titre');
            $table->longtext('description');
            $table->boolean('visible')->default(false);
        });
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('titre');
            $table->text('date');
            $table->longtext('description');
            $table->boolean('visible')->default(false);
        });
        Schema::create('langages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('titre');
            $table->longtext('description');
            $table->boolean('visible')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('competences');
        Schema::dropIfExists('formations');
        Schema::dropIfExists('langages');
    }
}
