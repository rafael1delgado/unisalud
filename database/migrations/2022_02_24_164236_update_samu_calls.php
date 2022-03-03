<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSamuCalls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samu_calls', function (Blueprint $table) {
            $table->foreignId('commune_id')
                ->nullable()
                ->after('telephone')
                ->constrained('communes');

            $table->decimal('latitude', 10, 8)
                ->after('address')
                ->nullable();

            $table->decimal('longitude', 10, 8)
                ->after('latitude')
                ->nullable();

            $table->enum('sex', ['MALE', 'FEMALE', 'UNKNOWN', 'OTHER'])
                ->after('regulation')
                ->nullable();
            
            $table->string('reason') 
                ->after('regulator_id')
                ->nullable();

            $table->boolean('police_intervention')
                ->after('reason')
                ->nullable();

            $table->decimal('age') 
                ->after('applicant')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
