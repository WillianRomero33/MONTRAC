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
        $this->call([RoleSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([CompanySeeder::class]);
        $this->call([CountrySeeder::class]);
        $this->call([TransportSeeder::class]);
        $this->call([OriginDetailSeeder::class]);
        $this->call([TransportStatusSeeder::class]);
    }
}
