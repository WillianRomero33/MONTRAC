<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        // $this->call([UsersTableSeeder::class]);
        \App\Models\Company::factory(20)->create();
        \App\Models\Country::factory(25)->create();
        \App\Models\OriginDetail::factory(20)->create();
        \App\Models\Transport::factory(25)->create();
        \App\Models\TransportStatus::factory(25)->create();
    }
}
