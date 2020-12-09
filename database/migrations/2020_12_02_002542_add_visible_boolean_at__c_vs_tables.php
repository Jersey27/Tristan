<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisibleBooleanAtCVsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competences', function (Blueprint $table) {
            $table->boolean("visible")->default(false);
        });
        Schema::table('experiences', function (Blueprint $table) {
            $table->boolean("visible")->default(false);
        });
        Schema::table('formations', function (Blueprint $table) {
            $table->boolean("visible")->default(false);
        });
        Schema::table('langages', function (Blueprint $table) {
            $table->boolean("visible")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competences', function (Blueprint $table) {
            $table->dropcolumn("visible");
        });
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropcolumn("visible");
        });
        Schema::table('formations', function (Blueprint $table) {
            $table->dropcolumn("visible");
        });
        Schema::table('langages', function (Blueprint $table) {
            $table->dropcolumn("visible");
        });
    }
}
