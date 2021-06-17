<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeleconsultationSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teleconsultation_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->boolean('computer_or_similar')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('audio')->nullable();
            $table->boolean('webcam')->nullable();
            $table->boolean('microphone')->nullable();
            $table->enum('internet_skill', ['good', 'regular', 'bad'])->nullable();
            $table->boolean('place')->nullable();
            $table->boolean('has_experience')->nullable();
            $table->boolean('hearing_or_visual_impairment')->nullable();

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
        Schema::dropIfExists('teleconsultation_surveys');
    }
}
