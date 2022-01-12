<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuMobilesInServiceTable extends Migration
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
            $table->foreignId('shift_id')->constrained('samu_shifts');
            $table->foreignId('mobile_id')->constrained('samu_mobiles');
            $table->string('type')->nullable();
            $table->unsignedTinyInteger('position')->default(0);
            $table->text('observation')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('samu_mobiles_in_service');
    }
}
