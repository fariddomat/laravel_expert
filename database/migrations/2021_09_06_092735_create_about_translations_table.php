<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_id');
            $table->string('locale')->index();
            $table->longText('about_me');
            $table->longText('brief');
            $table->longText('who_are_we');
            $table->longText('history');
            $table->longText('massage');
            $table->longText('goals');
            $table->longText('vision');
            $table->longText('ambition');
            $table->longText('values');
            $table->unique(['about_id', 'locale']);
        });
        Schema::table('about_translations', function (Blueprint $table) {
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
}
