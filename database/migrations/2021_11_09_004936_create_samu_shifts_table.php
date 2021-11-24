<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_shifts', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->string('type');
            $table->datetime('opening_at');
            $table->datetime('closing_at')->nullable();
            $table->foreignId('creator_id')->constrained('users');
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
        Schema::dropIfExists('samu_shifts');
    }
}
