<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFqRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fq_requests', function (Blueprint $table) {
            $table->id();

            $table->enum('name',['specialty hours', 'dispensing', 'home hospitalization']);
            $table->enum('specialties',['broncopulmonar', 'otorrinolaringología',
                                        'endocrinología', 'gastroenterología', 'other'])->nullable();
            $table->enum('other_specialty',['kinesiología', 'nutrición', 'enfermería'])->nullable();
            $table->string('prescription_file')->nullable();
            $table->foreignId('contact_user_id');
            $table->foreignId('patient_id');
            $table->longText('observation_patient')->nullable();
            $table->enum('status',['pending', 'complete', 'rejected']);
            $table->enum('attention',['face-to-face', 'teleconsultation'])->nullable();
            $table->longText('link')->nullable();
            $table->dateTime('date_confirm')->nullable();
            $table->string('place')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('value')->nullable();
            $table->longText('observation_request')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->dateTime('date_confirm_record')->nullable();

            $table->foreign('contact_user_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('fq_requests');
    }
}
