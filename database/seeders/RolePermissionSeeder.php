<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $sellerRole = Role::create(['name' => 'seller']);
        $clientRole = Role::create(['name' => 'client']);

        $persmissions = ['create', 'read', 'update', 'delete'];

        foreach ($persmissions as $persmission) {
            Permission::create(['name' => $persmission]);
        }

        $adminRole->syncPermissions([$persmissions]);
        $sellerRole->syncPermissions(['create', 'read', 'update']);
        $clientRole->syncPermissions(['read', 'update']);
    }
}
