<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identifiers_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->enum('use', ['usual', 'official', 'temp', 'secondary', 'old'])->nullable();
            $table->foreignId('cod_con_identifier_type_id')->nullable();
            $table->string('system')->nullable();
            $table->string('value')->nullable();
            $table->string('dv')->nullable();
            $table->foreignId('period_id')->nullable();
            $table->foreignId('practitioner_id')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->foreignId('appointment_id')->nullable();

            $table->timestamps();

            $table->foreign('identifiers_id')->references('id')->on('identifiers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cod_con_identifier_type_id')->references('id')->on('cod_con_identifier_types');
            $table->foreign('practitioner_id')->references('id')->on('practitioners');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('appointment_id')->references('id')->on('appointments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifiers');
    }
}
