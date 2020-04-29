<?php

use App\Models\EquipmentModel;
use App\Models\EquipmentType;
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
        $this->call(UsersTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(EquipmentBrandSeeder::class);
        $this->call(EquipmentTypeSeeder::class);
        $this->call(EquipmentModelSeeder::class);
        $this->call(TypeServiceSeeder::class);

    }
}
