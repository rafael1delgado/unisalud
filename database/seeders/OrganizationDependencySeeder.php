<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationDependency;

class OrganizationDependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Servicio de Salud';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Autoridad Sanitaria';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Privado';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Otra Institución';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Público No perteneciente al SNSS';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Municipal';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Establecimiento Experimental';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Pendiente';
        $OrganizationDependency->save();

        $OrganizationDependency = new OrganizationDependency();
        $OrganizationDependency->name = 'Ministerio de Justicia';
        $OrganizationDependency->save();        

    }
}
