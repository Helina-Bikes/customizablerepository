<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Add this import for the User model
use Spatie\Permission\Models\Role;
class SystemOwnerSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'System Owner',
            'email' => 'owner@example.com', // You can change the email to whatever you want
            'password' => Hash::make('password123'), // You can change the password
        ]);

        // Assign the System Owner role to the user
        $systemOwnerRole = Role::where('name', 'System Owner')->first();
        
        if ($systemOwnerRole) {
            $user->assignRole($systemOwnerRole);
        }
        $roles = $user->roles;

// Print roles
    dd($roles);
    }
}
