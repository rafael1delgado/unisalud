<?php

use App\Models\Samu\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrateCallsToSamuEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $events = Event::all();

        foreach($events as $event)
        {
            if($event->calls->count() > 0)
            {
                $calls = $event->calls()->orderBy('samu_call_event.call_id', 'asc')->get();

                $firstCall = $calls->first();

                $event->update([
                    'call_id' => $firstCall->id
                ]);

                $otherCalls = $calls->whereNotIn('id', $firstCall->id);

                foreach($otherCalls as $call)
                {
                    $call->update([
                        'call_id' => $firstCall->id
                    ]);
                }
            }
        }
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
