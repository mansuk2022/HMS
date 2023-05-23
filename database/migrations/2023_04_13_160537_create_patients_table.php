<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('dieases')->nullable();
            $table->string('image')->nullable();
            $table->string('room_no')->nullable();
            $table->dateTime('check_in_date')->nullable();
            $table->dateTime('appointment_time')->nullable();
            $table->longText('description')->nullable();
            $table->integer('age')->nullable();
            $table->string('treatment')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender')->nullable();
            $table->string('oxygen_level')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('sugar')->nullable();
            $table->unsignedBigInteger('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('patients');
    }
}
