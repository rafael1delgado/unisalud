<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->enum('required', ['required', 'optional', 'information-only',
            ])->nullable();
            $table->enum('status', ['accepted', 'declined', 'tentative', 'need-action',
            ])->nullable();

            $table->timestamps();

            $table->foreign('participant_id')->references('id')->on('participant');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant');
    }
}
