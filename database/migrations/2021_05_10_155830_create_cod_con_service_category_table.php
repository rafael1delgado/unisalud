<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodConServiceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_con_service_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_con_service_category_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('appointment_id')->nullable();
            $table->string('text');

            $table->foreign('cod_con_service_category_id')->references('id')->on('cod_con_service_category');
            $table->foreign('coding_id')->references('id')->on('coding');
            $table->foreign('appointment_id')->references('id')->on('appointment');

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
