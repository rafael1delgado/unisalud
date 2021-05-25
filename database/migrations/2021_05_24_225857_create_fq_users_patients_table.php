<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFqUsersPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fq_users_patients', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contact_user_id');
            $table->foreignId('patient_id');

            $table->foreign('contact_user_id')->references('id')->on('fq_contact_users');
            $table->foreign('patient_id')->references('id')->on('fq_patients');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fq_users_patients');
    }
}
