<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuQtcKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_qtc_keys', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('id_qtc');
            $table->foreignId('key');
            $table->foreignId('return_key');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_qtc')->references('id')->on('samu_qtcs');
            $table->foreign('key')->references('id')->on('samu_code_keys');
            $table->foreign('return_key')->references('id')->on('samu_code_keys');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_qtc_keys');
    }
}
