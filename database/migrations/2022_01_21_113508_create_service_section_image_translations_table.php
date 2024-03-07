<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSectionImageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_section_image_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_section_image_id');
            $table->string('locale')->index();
            $table->string('caption');
            $table->unique(['service_section_image_id', 'locale'], 's_s_image_id_locale_unique');
        });
        Schema::table('service_section_image_translations', function (Blueprint $table) {
            $table->foreign('service_section_image_id', 's_s_image_translations_s_s_image_id_fk')->references('id')->on('service_section_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_section_image_translations');
    }
}
