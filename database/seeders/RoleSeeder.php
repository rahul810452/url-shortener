<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'create company']);
        Permission::firstOrCreate(['name' => 'edit company']);
        Permission::firstOrCreate(['name' => 'delete company']);

        Permission::firstOrCreate(['name' => 'invite admin']);
        Permission::firstOrCreate(['name' => 'invite member']);

        Permission::firstOrCreate(['name' => 'create short url']);
        Permission::firstOrCreate(['name' => 'view short url']);
    }
}
