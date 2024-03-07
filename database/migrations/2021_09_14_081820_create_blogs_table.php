<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('blog_category_id');
            $table->string('image');
            $table->boolean('showed');
            $table->boolean('show_at_home');
            $table->string('author_image')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
