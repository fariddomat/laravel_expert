<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('blog_category_id');
            $table->string('image');
            $table->boolean('showed');
            $table->string('author_image');
            $table->string('author_instagram')->nullable();
            $table->string('author_snapchat')->nullable();
            $table->string('author_twitter')->nullable();
            $table->string('author_tiktok')->nullable();
            $table->string('author_linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_blogs');
    }
}
