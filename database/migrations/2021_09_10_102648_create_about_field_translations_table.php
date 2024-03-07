<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutFieldTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_field_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_field_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('value');
            $table->unique(['about_field_id', 'locale']);
        });
        Schema::table('about_field_translations', function (Blueprint $table) {
            $table->foreign('about_field_id')->references('id')->on('about_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_field_translations');
    }
}
