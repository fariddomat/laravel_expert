<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_category_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['work_category_id', 'locale']);
        });
        Schema::table('work_category_translations', function (Blueprint $table) {
            $table->foreign('work_category_id')->references('id')->on('work_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_category_translations');
    }
}
