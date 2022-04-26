<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MigrateGenderSexToTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MigrateGenderSexToTables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Traspasa datos de género y sexo a tablas';

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
        $users = User::all();

        foreach ($users as $user) {
            switch ($user->sex) {
                case 'male':
                    $user->sexes()->attach(1, ['valid_from' => now()]);
                    break;
                case 'female':
                    $user->sexes()->attach(2, ['valid_from' => now()]);
                    break;
                case 'unknown':
                    $user->sexes()->attach(3, ['valid_from' => now()]);
                    break;
                case 'other':
                    $user->sexes()->attach(4, ['valid_from' => now()]);
                    break;
            }

            switch ($user->gender) {
                case 'male':
                    $user->genders()->attach(1, ['valid_from' => now()]);
                    break;
                case 'female':
                    $user->genders()->attach(2, ['valid_from' => now()]);
                    break;
                case 'transgender-female':
                    $user->genders()->attach(3, ['valid_from' => now()]);
                    break;
                case 'transgender-male':
                    $user->genders()->attach(4, ['valid_from' => now()]);
                    break;
                case 'other':
                    $user->genders()->attach(5, ['valid_from' => now()]);
                    break;
            }
        }
    }
}
