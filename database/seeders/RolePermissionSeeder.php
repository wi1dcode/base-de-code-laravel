<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $viewDashboardPermission = Permission::firstOrCreate(['name' => 'view dashboard']);

        $adminRole->givePermissionTo($viewDashboardPermission);

        $user = User::where('email', 'admin@example.com')->first();

        $user?->assignRole('admin');
    }
}