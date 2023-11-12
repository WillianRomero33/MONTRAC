<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportStatusesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('transport_statuses')->insert([
                'id_transport' => rand(1, 10),
                'id_origindetail' => rand(1, 10),
                'inicio_transito' => now(),
                'fin_transito' => now(),
                'inicio_selectivo' => now(),
                'fin_selectivo' => now(),
                'fin_revision' => now(),
                'descarga' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
