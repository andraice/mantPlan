<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EquipmentModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('equipment_model')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'equipment_brand_id' => 1,
            'user_id' => 1
        ]);
        DB::table('equipment_model')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'equipment_brand_id' => 1,
            'user_id' => 1
        ]);
        DB::table('equipment_model')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'equipment_brand_id' => 2,
            'user_id' => 1
        ]);
        DB::table('equipment_model')->insert([
            'name' => $faker->word,
            'status' => 'A',
            'equipment_brand_id' => 3,
            'user_id' => 1
        ]);
    }
}
