<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permissions
        $permissions = [
            'view dashboard',
            'manage users',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $pegawai = Role::firstOrCreate(['name' => 'pelanggan']);
        $pengepul = Role::firstOrCreate(['name' => 'pengepul']);

        // Assign permissions to roles
        $admin->syncPermissions($permissions); // semua permission
        $pegawai->syncPermissions(['view dashboard', 'view reports']);

    }
}
