<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\HumanName;

class SetNameToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SetNameToUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Name to User from humman name';

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
                $user->given = $user->text ?? null;
                $user->fathers_family = $user->OfficialFathersFamily ?? null;
                $user->mothers_family = $user->OfficialMothersFamily ?? null;
                $user->save();
            }
            else{
                echo $user->id.', ';
            }
        }

        $humanNames = HumanName::all();
        foreach($humanNames as $hn)
        {
            $hn->given = $hn->text;
            $hn->text = trim($hn->given).' '.trim($hn->fathers_family).' '.trim($hn->mothers_family);
            $hn->save();
        }
    }
}
