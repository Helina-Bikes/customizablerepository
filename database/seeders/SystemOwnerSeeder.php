<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SystemOwnerSeeder extends Seeder
{
    public function run()
    {
        // Ensure the role exists before assigning
        $systemOwnerRole = Role::firstOrCreate(['name' => 'System Owner']);

        // Create the user if they don't already exist
        $user = User::firstOrCreate(
            ['email' => 'owner@example.com'], // Check by email to prevent duplicate users
            [
                'name' => 'System Owner',
                'password' => Hash::make('password123'), 
            ]
        );

        // Assign the role to the user
        $user->assignRole($systemOwnerRole);

        // Debugging output
        $roles = $user->getRoleNames(); // Fetch role names

        dd($roles); // Should display ["System Owner"]
    }
}
