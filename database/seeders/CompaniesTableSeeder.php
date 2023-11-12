<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('companies')->insert([
                'Empresa' => 'Empresa ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
