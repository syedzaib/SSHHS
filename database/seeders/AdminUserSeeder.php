<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'codebyzohaib@gmail.com'], // prevent duplicates
            [
                'name' => 'Admin',
                'id_number' => 'ADM001',
                'date_of_birth' => '1990-01-01',
                'mobile_number' => '0500000000',
                'nationality' => 'Saudi',
                'gender' => 'male',
                'qualification' => 'MBA',
                'specialization' => 'Management',
                'role' => 'admin',
                'is_approved' => true,
                'password' => Hash::make('password'),
            ]
        );
    }
}
