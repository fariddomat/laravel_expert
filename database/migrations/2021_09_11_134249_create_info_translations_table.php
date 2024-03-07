<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('info_id');
            $table->string('locale')->index();
            $table->text('title');
            $table->text('description');
            $table->text('work');
            $table->text('work_description');
            $table->unique(['info_id', 'locale']);
        });
        Schema::table('info_translations', function (Blueprint $table) {
            $table->foreign('info_id')->references('id')->on('infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_translations');
    }
}
