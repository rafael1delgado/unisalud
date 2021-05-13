<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeableConOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeable_con_organization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codeable_con_organization_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->string('text');

            $table->foreign('codeable_con_organization_id')->references('id')->on('codeable_con_organization');
            $table->foreign('coding_id')->references('id')->on('coding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codeable_con_organization');
    }
}
