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
            $table->string('identifier');
            $table->boolean('active');
            $table->bigInteger('run')->unsigned()->unique();
            $table->char('dv');
            $table->foreignId('human_names_id')->nullable();
            $table->foreignId('contact_point_id')->nullable();
            $table->enum('gender', ['female', 'male', 'other', 'unknown',
            ])->nullable();
            $table->date('birthday')->nullable();
            $table->datetime('deceased_datetime')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('codeable_concept_marital_id')->nullable(); /** marriage  */
            $table->Integer('multiple_birth')->nullable(); /** esp: parto múltiple */
            $table->foreignId('attachment_id')->nullable();
            $table->foreignId('emergency_contact_id')->nullable(); /** It refers to: parentezco con familiar */
            $table->foreignId('communication')->nullable();
            $table->foreignId('codeable_con_practitioner_id')->nullable();
            $table->foreignId('codeable_con_practitioner_id')->nullable();
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
            $table->foreign('human_names_id')->references('id')->on('human_names');
            $table->foreign('contact_point_id')->references('id')->on('contact_point');
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('codeable_concept_marital_id')->references('id')->on('codeable_concept_marital');
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->foreign('emergency_contact_id')->references('id')->on('emergency_contact');
            $table->foreign('communication_id')->references('id')->on('communication');
            $table->foreign('codeable_con_practitioner_id')->references('id')->on('codeable_con_practitioner');

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
