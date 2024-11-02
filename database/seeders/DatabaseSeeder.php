<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Category;
use App\Models\Reports;
use App\Models\Response;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissions::class);
        User::factory(10)->create()->each(function ($user) {
            //random assign role
            $user->assignRole(RolesEnum::Member->value);
        });
        Category::factory(10)->create();
        Reports::factory(15)->create();
        Response::factory(20)->create();
    }
}