<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // member permissions
        Permission::create(['name' => 'edit report']);
        Permission::create(['name' => 'add report']);
        Permission::create(['name' => 'delete report']);
        // admin permissions
        Permission::create(['name' => 'add category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'change user role']);
        Permission::create(['name' => 'add news']);
        Permission::create(['name' => 'edit news']);
        Permission::create(['name' => 'delete news']);
        // goverment permissions
        Permission::create(['name' => 'add response']);
        Permission::create(['name' => 'edit response']);
        Permission::create(['name' => 'delete response']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $role = Role::create(['name' => RolesEnum::Member->value]);
        $role->givePermissionTo(
            ['edit report', 'add report', 'delete report']
        );

        $role = Role::create(['name' => RolesEnum::Goverment->value]);
        $role->givePermissionTo(['add response', 'edit response', 'delete response']);

        $role = Role::create(['name' => RolesEnum::Admin->value]);
        $role->givePermissionTo(Permission::all());
    }
}