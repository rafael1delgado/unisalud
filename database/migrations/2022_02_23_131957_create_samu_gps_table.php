<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_gps', function (Blueprint $table) {
            $table->id();

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
            $table->string('altitude')->nullable();

            $table->string('anotation')->nullable();
            $table->string('satelite')->nullable();
            $table->string('speed')->nullable();
            $table->string('precision')->nullable();
            $table->string('address')->nullable();
            $table->string('operator')->nullable();

            $table->string('time_start')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('date_diff')->nullable();
            $table->date('date')->nullable();
            $table->string('hour_diff')->nullable();

            $table->decimal('battery')->nullable();
            $table->boolean('is_charging')->nullable();
            $table->string('android_identifier')->nullable();
            $table->string('serial')->nullable();
            $table->string('file')->nullable();
            $table->string('profile')->nullable();
            $table->string('hdop')->nullable();
            $table->string('vdop')->nullable();
            $table->string('pdop')->nullable();
            $table->string('travel')->nullable();

            $table->foreignId('mobile_id')
                ->nullable()
                ->constrained('samu_mobiles');

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
        Schema::dropIfExists('samu_gps');
    }
}
