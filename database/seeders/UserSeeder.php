<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin / Médecin
        User::create([
            'name' => 'Dr. Mohammed',
            'email' => 'admin@cabinet.com',
            'password' => Hash::make('password123'),
        ]);

        // Patients
        $patients = [
            ['name' => 'Ahmed Alaoui', 'email' => 'ahmed@gmail.com'],
            ['name' => 'Fatima Benali', 'email' => 'fatima@gmail.com'],
            ['name' => 'Youssef Tazi', 'email' => 'youssef@gmail.com'],
            ['name' => 'Khadija Idrissi', 'email' => 'khadija@gmail.com'],
            ['name' => 'Omar Cherkaoui', 'email' => 'omar@gmail.com'],
            ['name' => 'Nadia Mansouri', 'email' => 'nadia@gmail.com'],
            ['name' => 'Karim Berrada', 'email' => 'karim@gmail.com'],
            ['name' => 'Samira Kadiri', 'email' => 'samira@gmail.com'],
            ['name' => 'Hassan Filali', 'email' => 'hassan@gmail.com'],
        ];

        foreach ($patients as $patient) {
            User::create([
                'name' => $patient['name'],
                'email' => $patient['email'],
                'password' => Hash::make('password123'),
            ]);
        }
    }
}