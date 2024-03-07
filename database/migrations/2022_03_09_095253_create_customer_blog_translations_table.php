<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBlogTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_blog_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_blog_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('introduction');
            $table->longText('content_table');
            $table->longText('first_paragraph');
            $table->longText('description');
            $table->string('author_name');
            $table->string('author_title');
            $table->unique(['customer_blog_id', 'locale'], 'c_b_translations_c_b_id_unique');
        });
        Schema::table('customer_blog_translations', function (Blueprint $table) {
            $table->foreign('customer_blog_id', 'c_b_translations_c_b_id_foreign')->references('id')->on('customer_blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_blog_translations');
    }
}
