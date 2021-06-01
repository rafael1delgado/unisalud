<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOperatingRoomSpecProfTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mp_operating_room_specialties', function (Blueprint $table) {
          $table->unsignedInteger('operating_room_id');
          $table->unsignedInteger('specialty_id');
          $table->foreign('operating_room_id')->references('id')->on('mp_operating_rooms')->onDelete('cascade');
          $table->foreign('specialty_id')->references('id')->on('mp_specialties');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('mp_operating_room_professions', function (Blueprint $table) {
          $table->unsignedInteger('operating_room_id');
          $table->unsignedInteger('profession_id');
          $table->foreign('operating_room_id')->references('id')->on('mp_operating_rooms')->onDelete('cascade');
          $table->foreign('profession_id')->references('id')->on('mp_professions');

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::table('mp_activities', function (Blueprint $table) {
          $table->boolean('programmable')->default(0)->after('performance');
      });

      Schema::create('mp_services', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('service_name')->nullable();
          $table->string('color')->nullable();

          $table->timestamps();
          $table->softDeletes();
      });

      Schema::create('mp_user_services', function (Blueprint $table) {
          $table->unsignedBigInteger('service_id');
          $table->unsignedBigInteger('user_id');
          $table->boolean('principal')->default(0);

          $table->foreign('service_id')->references('id')->on('mp_services');
          $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('mp_operating_room_specialties');
        Schema::dropIfExists('mp_operating_room_professions');
        Schema::table('mp_activities', function (Blueprint $table) {
            $table->dropColumn('programmable');
        });
        Schema::dropIfExists('mp_user_services');
        Schema::dropIfExists('mp_services');
    }
}
