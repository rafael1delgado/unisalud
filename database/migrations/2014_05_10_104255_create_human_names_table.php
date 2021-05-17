<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_names', function (Blueprint $table) {
            $table->id();
            $table->enum('use', ['official', 'temp', 'nickname', 'anonymous', 'old', 'maiden',
            ])->nullable();
            $table->string('text')->nullable();
            $table->string('fathers_family')->nullable();
            $table->string('mothers_family')->nullable();
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->foreignId('human_names_id')->nullable();
            $table->foreignId('user_id');

            $table->timestamps();

            $table->foreign('human_names_id')->references('id')->on('human_names');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('human_names');
    }
}
