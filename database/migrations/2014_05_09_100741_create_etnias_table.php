<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etnias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etnia_id')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('etnia_id')->references('id')->on('etnias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etnias');
    }
}
