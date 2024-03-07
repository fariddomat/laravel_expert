<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceIndexItemTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_index_item_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_index_item_id');
            $table->string('locale')->index();
            $table->text('name');
            $table->longText('description');
            $table->unique(['service_index_item_id', 'locale'], 'item_id_locale_unique');
        });
        Schema::table('service_index_item_translations', function (Blueprint $table) {
            $table->foreign('service_index_item_id')->references('id')->on('service_index_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_index_item_translations');
    }
}
