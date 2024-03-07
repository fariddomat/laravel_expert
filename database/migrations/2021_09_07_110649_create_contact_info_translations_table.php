<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_info_id');
            $table->string('locale')->index();
            $table->text('location');
            $table->unique(['contact_info_id', 'locale']);
        });
        Schema::table('contact_info_translations', function (Blueprint $table) {
            $table->foreign('contact_info_id')->references('id')->on('contact_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_info_translations');
    }
}
