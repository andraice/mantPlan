<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('company_type')->insert([
            'name' => $faker->word
        ]);
        DB::table('company_type')->insert([
            'name' => $faker->word
        ]);
        DB::table('company_type')->insert([
            'name' => $faker->word
        ]);
    }
}
