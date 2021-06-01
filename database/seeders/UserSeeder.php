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
        $user->id = 12345678;
        $user->active = 1;
        $user->claveunica = 1;
        $user->birthday = now();
        $user->gender = 'other';
        $user->save();

        $humanName = new HumanName();
        $humanName->use = 'official';
        $humanName->text = 'usuario';
        $humanName->fathers_family = 'ficticio';
        $humanName->mothers_family = 'araya';
        $humanName->user_id = $user->id;
        $humanName->save();

        $user = new User();
        $user->id = 17430005;
        $user->active = 1;
        $user->run = 17430005;
        $user->dv = '4';
        $user->claveunica = 1;
        $user->birthday = now();
        $user->gender = 'other';
        $user->save();

        $humanName = new HumanName();
        $humanName->use = 'official';
        $humanName->text = 'Administrador';
        $humanName->fathers_family = 'Programador';
        $humanName->mothers_family = 'Médico';
        $humanName->user_id = $user->id;
        $humanName->save();

        // $user->givePermissionTo(Permission::all());
    }
}
