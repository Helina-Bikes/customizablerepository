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
        $systemOwnerRole = Role::firstOrCreate(['name' => 'Netsanet']);

        // Create the user if they don't already exist
        $user = User::firstOrCreate(
            ['email' => 'netsi@gmail.com'], // New email
            [
                'name' => 'Netsanet', // New name
                'password' => Hash::make('babyenanye'), // New password
            ]
        );

        // Assign the role to the user
        $user->assignRole($systemOwnerRole);

        // Debugging output
        $roles = $user->getRoleNames(); // Fetch role names

        dd($roles); // Should display ["System Owner"]
    }
}
