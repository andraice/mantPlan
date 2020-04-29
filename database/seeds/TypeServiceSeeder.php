<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('type_service')->insert([
            'name' => 'PREVENTIVO',
            'user_id' => 1
        ]);
        DB::table('type_service')->insert([
            'name' => 'CORRECTIVO',
            'user_id' => 1
        ]);
        DB::table('type_service')->insert([
            'name' => 'INSTALACIÓN',
            'user_id' => 1
        ]);
    }
}
