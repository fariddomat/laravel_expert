<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBlogCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_blog_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_blog_category_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['customer_blog_category_id', 'locale'], 'c_b_c_translations_c_b_c_id_unique');
        });
        Schema::table('customer_blog_category_translations', function (Blueprint $table) {
            $table->foreign('customer_blog_category_id', 'c_b_c_translations_c_b_c_id_foreign')->references('id')->on('customer_blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_blog_category_translations');
    }
}
