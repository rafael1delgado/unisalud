<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emergency_contact_id')->nullable();
            $table->foreignId('cod_con_relation_id')->nullable(); /** parentezco con familiar */
            $table->foreignId('human_name_id')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->enum('gender', ['female', 'male', 'other', 'unknown',
            ])->nullable();
            $table->string('organization')->nullable();
            $table->foreignId('period_id')->nullable();

            $table->foreign('emergency_contact_id')->references('id')->on('emergency_contacts');
            $table->foreign('cod_con_relation_id')->references('id')->on('cod_con_relations');
            $table->foreign('human_name_id')->references('id')->on('human_names');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('period_id')->references('id')->on('periods');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_contact');
    }
}
