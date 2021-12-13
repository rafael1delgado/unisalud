<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\HumanName;

class SetStartEndPeriodHumanNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SetStartEndPeriodHumanNames';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set start and end period for human names';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::with('HumanNames')->get();
        foreach($users as $user) 
        {
            if(count($user->humanNames) > 0) {
                foreach($user->humanNames as $key => $humanName){
                    $humanName->period_start = $humanName->created_at->addSeconds(1);
                    if(array_key_exists($key +1, $user->humanNames->toArray()) && $user->humanNames[$key +1]){
                        $humanName->period_end = $user->humanNames[$key +1]->created_at;
                    }
                    else{
                        $humanName->period_end = null;
                    }
                    $humanName->save();
                }                
            }
            else{
                echo $user->id.', ';
            }
        }
    }
}
