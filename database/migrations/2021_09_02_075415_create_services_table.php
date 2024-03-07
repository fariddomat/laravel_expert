<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('index_image')->nullable();
            $table->string('index_image_2')->nullable();
            $table->boolean('showed');
            $table->boolean('show_at_home');
            $table->integer('parent_id')->nullable();
            $table->text('slider1')->nullable();
            $table->text('slider2')->nullable();
            $table->text('slider3')->nullable();

            $table->foreign('parent_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('services');
    }
}
