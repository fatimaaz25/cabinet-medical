<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Consultation Générale', 'description' => 'Consultation médicale générale', 'duration' => 30, 'price' => 150],
            ['name' => 'Consultation Spécialisée', 'description' => 'Consultation avec spécialiste', 'duration' => 45, 'price' => 250],
            ['name' => 'Suivi de traitement', 'description' => 'Suivi médical régulier', 'duration' => 20, 'price' => 100],
            ['name' => 'Bilan de santé', 'description' => 'Bilan médical complet', 'duration' => 60, 'price' => 400],
            ['name' => 'Vaccination', 'description' => 'Service de vaccination', 'duration' => 15, 'price' => 80],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}