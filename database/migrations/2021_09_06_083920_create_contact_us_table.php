<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('contact_method');
            $table->date('dob');
            $table->dateTime('start_at');
            $table->string('city');
            $table->string('cert_degree');
            $table->text('message')->nullable();
            $table->tinyInteger('status');
            $table->string('ip')->nullable();
            $table->timestamps();
            $table->text('note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}
