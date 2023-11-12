<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('countries')->insert([
                'pais' => 'País ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
