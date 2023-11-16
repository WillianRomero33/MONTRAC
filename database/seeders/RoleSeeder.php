<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name' => 'Admin']);
        $import = Role::create(['name' => 'Import']);
        $aduana = Role::create(['name' => 'Aduana']);
        $bodega = Role::create(['name' => 'Bodega']);
        $vigilancia = Role::create(['name' => 'Vigilancia']);
    }
}
