<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationCommunes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communes', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)
                ->nullable()
                ->after('code_deis');

            $table->decimal('longitude', 10, 8)
                ->nullable()
                ->after('latitude');
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
