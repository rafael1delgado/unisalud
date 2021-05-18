<?php

namespace Database\Seeders;

use App\Http\Livewire\Parameter\Permission;
use App\Models\HumanName;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->id = 16351236;
        $user->identifier = 1;
        $user->active = 1;
        $user->run = 16351236;
        $user->dv = 'k';
        $user->claveunica = 1;
        $user->birthday = now();
        $user->gender = 'male';
        $user->save();

        $humanName = new HumanName();
        $humanName->use = 'official';
        $humanName->text = 'Germán Andrés';
        $humanName->fathers_family = 'Zúñiga';
        $humanName->mothers_family = 'Codocedo';
        $humanName->user_id = $user->id;
        $humanName->save();

//        $user->givePermissionTo(Permission::all());
    }
}
