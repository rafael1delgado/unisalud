<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuShiftMobileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_shift_mobile', function (Blueprint $table) {

            $table->id();
            $table->string('detail');
            $table->string('type');
            $table->foreignId('shift_id');
            $table->foreignId('mobile_id');


            $table->foreign('shift_id')->references('id')->on('samu_shift');
            $table->foreign('mobile_id')->references('id')->on('samu_mobiles');

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
        Schema::dropIfExists('samu_shift_mobile');
    }
}
