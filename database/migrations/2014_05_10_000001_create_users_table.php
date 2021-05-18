<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('identifier');
            $table->boolean('active');
            $table->bigInteger('run')->unsigned()->unique();
            $table->char('dv');
            $table->enum('gender', ['female', 'male', 'other', 'unknown',
            ])->nullable();
            $table->date('birthday')->nullable();
            $table->datetime('deceased_datetime')->nullable();
            $table->foreignId('codeable_concept_marital_id')->nullable(); /** marriage  */
            $table->Integer('multiple_birth')->nullable(); /** esp: parto múltiple */
            $table->string('team')->nullable();



          /**  $table->timestamp('email_verified_at')->nullable(); */
           /** DON'T KNOW THAT THESE ARE */
            $table->string('password')->nullable();

            $table->boolean('claveunica')->nullable();
            $table->string('fhir_id')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            /**  FOREIGN KEYS  */
            $table->foreign('user_id')->references('id')->on('users');  
            $table->foreign('codeable_concept_marital_id')->references('id')->on('codeable_concept_marital');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
