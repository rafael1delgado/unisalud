<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuFollowMisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_follow_mis', function (Blueprint $table) {
            $table->id();
            //para referirse a un campo de una tabla como llave foranea en la tabla actual "constrained"
            $table->foreignId('mobile_in_service_id')->constrained('samu_mobiles_in_service');
            $table->foreignId('follow_id')->constrained('samu_follows');


            $table->softDeletes();
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
        Schema::dropIfExists('samu_follow_mis');
    }
}
