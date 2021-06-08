<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'Administrator','description'=>'Administrador del sistema']);
        Permission::create(['name'=>'Developer','description'=>'Desarrollador']);
        Permission::create(['name'=>'Medical Programmer: administrator','description'=>'Administrador del programador médico']);
        Permission::create(['name'=>'Fq: admin','description'=>'Administrador de Fq']);

    }
}
