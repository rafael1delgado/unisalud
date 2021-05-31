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
            $table->foreignId('cod_con_identifiers_types_id')->nullable();
            $table->string('system')->nullable();
            $table->string('value')->nullable();
            $table->foreignId('period_id')->nullable();
            $table->string('organization')->nullable(); //organization that issued id
            $table->timestamps();

            $table->foreign('identifiers_id')->references('id')->on('identifiers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cod_con_identifiers_types_id')->references('id')->on('cod_con_identifiers_types');
        
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
