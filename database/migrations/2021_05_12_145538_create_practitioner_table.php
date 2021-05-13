<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioner', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->boolean('active');
            $table->foreignId('human_name_practitioner_id')->nullable();
            $table->foreignId('contact_point_practitioner_id')->nullable();
            $table->foreignId('address_practitioner_id')->nullable();
            $table->enum('gender', ['male', 'female', 'other', 'unknown',
            ])->nullable();
            $table->date('birthday')->nullable();
            $table->foreignId('attachment_id')->nullable(); /** Image of the person */
            $table->foreignId('codeable_con_practitioner_id')->nullable();
            $table->string('team')->nullable();
            $table->foreignId('communication_id')->nullable();


            $table->timestamps();
            $table->foreign('human_name_practitioner_id')->references('id')->on('human_name_practitioner');
            $table->foreign('contact_point_practitioner_id')->references('id')->on('contact_point_practitioner');
            $table->foreign('address_practitioner_id')->references('id')->on('address_practitioner');
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->foreign('codeable_con_practitioner_id')->references('id')->on('codeable_con_practitioner');
            $table->foreign('communication_id')->references('id')->on('communication');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practitioner');
    }
}
