<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilesInServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_mobiles_in_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id')->constrained('samu_shift');
            $table->foreignId('mobile_id')->constrained('samu_mobiles');
            $table->text('observation')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_mobiles_in_service');
    }
}
