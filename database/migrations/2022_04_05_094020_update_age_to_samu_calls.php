<?php

use App\Models\Samu\Call;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAgeToSamuCalls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samu_calls', function (Blueprint $table) {
            $table->integer('year')->after('age')->nullable();
            $table->integer('month')->after('year')->nullable();
        });

        $calls = Call::all();
        foreach($calls as $call)
        {
            $call->update([
                'year' => ($call->age != null && $call->age < 1) ? null : $call->age,
                'month' => $call->month_format != 0 ? $call->month_format : null
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samu_calls', function (Blueprint $table) {
            //
        });
    }
}
