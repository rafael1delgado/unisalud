<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('contract_id')->nullable();
            $table->foreign('contract_id')->references('id')->on('mp_contracts');
            $table->foreignId('identifier_id')->nullable();
            $table->foreign('identifier_id')->references('id')->on('identifiers');
            $table->foreignId('practitioner_id')->nullable();
            $table->foreign('practitioner_id')->references('id')->on('practitioners');
            $table->string('health_insurance')->nullable();
            $table->string('social_insurance')->nullable();
            $table->string('legal_quality')->nullable();
            $table->string('staff')->nullable();
            $table->bigInteger('res_number')->nullable();
            $table->date('res_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('total_days')->nullable();
            $table->float('period_days')->nullable();
            $table->bigInteger('license_cost')->nullable();
            $table->string('type')->nullable();
            $table->float('balance_days_not_replaced')->nullable();
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
        Schema::dropIfExists('work_absences');
    }
}
