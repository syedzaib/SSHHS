<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       User::create([
            'name' => 'Admin',
            'email' => 'codebyzohaib@gmail.com',
            'id_number' => 'ADMIN-001',
            'date_of_birth' => '1990-01-01',
            'mobile_number' => '0500000000',
            'nationality' => 'Saudi',
            'gender' => 'male',
            'qualification' => 'MBA',
            'specialization' => 'Management',
            'role' => 'admin',
            'is_approved' => true,
            'password' => Hash::make('password'),
        ]);

    }
}
