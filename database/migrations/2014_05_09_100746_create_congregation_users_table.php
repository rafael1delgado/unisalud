<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongregationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congregation_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('congregation_users_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('congregation_id')->nullable();

            $table->timestamps();
            $table->foreign('congregation_users_id')->references('id')->on('congregation_users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('congregation_id')->references('id')->on('congregations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congregation_users');
    }
}
