<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo_icon');
            $table->string('logo');
            $table->string('about_me_image');
            // $table->string('about_me_image_en');
            $table->string('service_image');
            $table->string('service_image_mobile');


            $table->string('who_image');
            $table->string('who_image_mobile');


            $table->string('counter_image');
            $table->string('counter_image_mobile');

            $table->string('service_header_image');
            $table->string('about_header_image');
            $table->string('blog_header_image');
            $table->string('contact_header_image');
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
        Schema::dropIfExists('infos');
    }
}
