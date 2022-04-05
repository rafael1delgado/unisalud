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
            $table->integer('month')->after('age')->nullable();
        });

        $calls = Call::all();
        foreach($calls as $call)
        {
            $call->update([
                'month' => $call->month_format != 0 ? $call->month_format : null
            ]);
        }

        Schema::table('samu_calls', function (Blueprint $table) {
            $table->integer('age')->change();
        });

        Schema::table('samu_calls', function (Blueprint $table) {
            $table->renameColumn('age', 'year');
        });

        $calls = Call::all();
        foreach($calls as $call)
        {
            $call->update([
                'year' => $call->year == 0 ? null : $call->year
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
