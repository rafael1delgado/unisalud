<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            CodConIdentifiersTypesSeeder::class,
           // IdentifierTypeSeeder::class,
            CountrySeeder::class,
            RegionSeeder::class,
            CodConMaritalSeeder::class,
            CommuneSeeder::class,
            CongregationSeeder::class,
            UserSeeder::class,


            // // HmRrhhTableSeeder::class,
            HmMotherActivityTableSeeder::class,
            HmActivityTypesTableSeeder::class,
            HmActivitiesTableSeeder::class,
            HmSpecialtiesTableSeeder::class,
            HmSpecialtyActivitiesTableSeeder::class,
            HmProfessionsTableSeeder::class,
            HmProfessionActivitiesTableSeeder::class,
            HmOperatingRoomsTableSeeder::class,
            HmServicesTableSeeder::class,
            // HmUserServicesTableSeeder::class,
            // HmContractsTableSeeder::class,
            // // HmUnscheduledProgrammingTableSeeder::class,
            HmUserSpecialtiesTableSeeder::class,
            HmUserProfessionsTableSeeder::class,

            // // HmTheoreticalProgrammingTableSeeder::class,
            // HmOperatingRoomProgrammingTableSeeder::class,

            //PractitionerSeeder::class,
            ExtMedicineSeeder::class,
        ]);
    }
}
