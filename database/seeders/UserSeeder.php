<?php

namespace Database\Seeders;

use App\Http\Livewire\Parameter\Permission;
use App\Models\Address;
use App\Models\ContactPoint;
use App\Models\HumanName;
use App\Models\Identifier;
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

        $identifier = new Identifier();
        $identifier->use = 'official';
        $identifier->cod_con_identifier_type_id = 1; // RUN
        $identifier->value = 12345678;
        $identifier->dv = 5;
        $identifier->user_id = $user->id;
        $identifier->save();

        $contactPoint = new ContactPoint();
        $contactPoint->system = 'phone';
        $contactPoint->user_id = $user->id;
        $contactPoint->value = 88993344;
        $contactPoint->use = 'mobile';
        $contactPoint->save();

        $contactPoint = new ContactPoint();
        $contactPoint->system = 'phone';
        $contactPoint->user_id = $user->id;
        $contactPoint->value = 425563;
        $contactPoint->use = 'work';
        $contactPoint->save();

        $contactPoint = new ContactPoint();
        $contactPoint->system = 'email';
        $contactPoint->user_id = $user->id;
        $contactPoint->value = 'e.mail@mail.com';
        $contactPoint->use = 'home';
        $contactPoint->save();

        $address = new Address();
        $address->user_id = $user->id;
        $address->type = 'physical';
        $address->text = 'pampa ilusion';
        $address->line = 1313;
        $address->city = 'iquique';
        $address->commune_id = 5;
        $address->region_id = 1;
        $address->country_id = 42;
        $address->save();

        $user = new User();
        $user->id = 17430005;
        $user->active = 1;
        // $user->run = 17430005;
        // $user->dv = '4';
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
