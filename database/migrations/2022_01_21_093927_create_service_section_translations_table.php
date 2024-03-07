<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSectionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_section_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_section_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('content');
            $table->unique(['service_section_id', 'locale'], 'section_id_locale_unique');
        });
        Schema::table('service_section_translations', function (Blueprint $table) {
            $table->foreign('service_section_id')->references('id')->on('service_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_section_translations');
    }
}
