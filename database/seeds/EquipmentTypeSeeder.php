<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('equipment_type')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'user_id' => 1
        ]);
        DB::table('equipment_type')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'user_id' => 1
        ]);
        DB::table('equipment_type')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'user_id' => 1
        ]);
    }
}
