<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('transports')->insert([
                'placa' => 'Placa ' . $i,
                'tipo' => 'Tipo ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
