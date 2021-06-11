<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practitioner_id')->nullable();
            $table->boolean('active')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->enum('sex', ['female', 'male', 'other', 'unknown'])->nullable();
            $table->date('birthDate')->nullable();



            $table->timestamps();

            $table->foreign('practitioner_id')->references('id')->on('practitioners');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organization_id')->references('id')->on('organizations');

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
