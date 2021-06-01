<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodConServicesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_con_services_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_con_service_category_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('appointment_id')->nullable();
            $table->string('text');

            $table->foreign('cod_con_service_category_id')->references('id')->on('cod_con_services_categories');
            $table->foreign('coding_id')->references('id')->on('codings');
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
        Schema::dropIfExists('cod_con_service_category');
    }
}
