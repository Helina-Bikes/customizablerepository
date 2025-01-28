<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddSystemOwnerRoleSeeder extends Seeder
{
    public function run()
    {
        // Add the new System Owner role if it doesn't already exist
        Role::firstOrCreate(
            ['name' => 'System Owner'],
            ['roledesc' => 'Has the highest access to the system, responsible for managing the system overall']
        );
    }
}
