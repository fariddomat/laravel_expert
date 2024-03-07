<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceQuestionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_question_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_question_id');
            $table->string('locale')->index();
            $table->text('question');
            $table->text('answer');
            $table->unique(['service_question_id', 'locale'], 's_question_id_locale_unique');
        });
        Schema::table('service_question_translations', function (Blueprint $table) {
            $table->foreign('service_question_id', 's_question_translations_s_id_fk')->references('id')->on('service_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_question_translations');
    }
}
