<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceWorkWayTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_work_way_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_work_way_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');
            $table->unique(['service_work_way_id', 'locale'], 's_work_id_locale_unique');
        });
        Schema::table('service_work_way_translations', function (Blueprint $table) {
            $table->foreign('service_work_way_id', 's_work_translations_s_id_fk')->references('id')->on('service_work_ways')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_work_way_translations');
    }
}
