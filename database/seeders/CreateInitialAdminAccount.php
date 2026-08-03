<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::withoutGlobalScope('active')->firstOrNew([
            'email' => 'admin@example.com',
        ]);

        $admin->forceFill([
            'name' => 'Admin User',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'is_active' => true,
            'is_admin' => true,
        ])->save();
    }
}
