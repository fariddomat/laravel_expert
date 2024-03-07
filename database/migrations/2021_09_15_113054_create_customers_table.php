<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->string('view_name')->default('index');
            $table->string('main_image')->nullable();
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('received_email')->nullable(); //email that receives messages for contact us
            $table->string('sms_number')->nullable();
            $table->string('land_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('website_name')->nullable();
            $table->text('location_link')->nullable();
            $table->boolean('contact_us_form');
            $table->boolean('blogs');
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
        Schema::dropIfExists('customers');
    }
}
