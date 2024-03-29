<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkWithUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_with_us', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->enum('gender', ['male', 'female']);
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('address');
            $table->enum('marital_status', ['single', 'married', 'other']);
            $table->string('study_major');
            $table->string('current_job')->nullable();
            $table->text('other_work_experiences')->nullable();
            $table->enum('english_level', ['beginner', 'intermediate', 'good', 'very_good']);
            $table->json('skills')->nullable(); // Store skills as a JSON array
            $table->text('additional_information')->nullable();
            $table->text('job_benefit_goals');
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
        Schema::dropIfExists('work_with_us');
    }
}
