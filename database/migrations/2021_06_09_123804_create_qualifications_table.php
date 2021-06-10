<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qualification_id')->nullable();
            $table->foreignId('identifiers_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('period_id')->nullable();
            $table->foreignId('practitioner_id')->nullable();

            $table->timestamps();

            $table->foreign('qualification_id')->references('id')->on('qualifications');
            $table->foreign('identifiers_id')->references('id')->on('identifiers');
            $table->foreign('coding_id')->references('id')->on('codings');
            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('practitioner_id')->references('id')->on('practitioners');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
