<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $appointments = [
            ['user_id' => 2, 'service_id' => 1, 'appointment_date' => '2026-06-05 09:00:00', 'status' => 'confirmed', 'notes' => 'Premier rendez-vous'],
            ['user_id' => 3, 'service_id' => 2, 'appointment_date' => '2026-06-05 10:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 4, 'service_id' => 3, 'appointment_date' => '2026-06-06 09:30:00', 'status' => 'confirmed', 'notes' => 'Suivi mensuel'],
            ['user_id' => 5, 'service_id' => 1, 'appointment_date' => '2026-06-06 11:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 6, 'service_id' => 4, 'appointment_date' => '2026-06-07 09:00:00', 'status' => 'confirmed', 'notes' => 'Bilan annuel'],
            ['user_id' => 7, 'service_id' => 5, 'appointment_date' => '2026-06-07 10:30:00', 'status' => 'confirmed', 'notes' => 'Vaccin grippe'],
            ['user_id' => 8, 'service_id' => 2, 'appointment_date' => '2026-06-08 09:00:00', 'status' => 'cancelled', 'notes' => 'Annulé'],
            ['user_id' => 9, 'service_id' => 1, 'appointment_date' => '2026-06-08 11:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 10, 'service_id' => 3, 'appointment_date' => '2026-06-09 09:00:00', 'status' => 'confirmed', 'notes' => 'Suivi traitement'],
            ['user_id' => 2, 'service_id' => 5, 'appointment_date' => '2026-06-09 10:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 3, 'service_id' => 4, 'appointment_date' => '2026-06-10 09:30:00', 'status' => 'confirmed', 'notes' => 'Bilan complet'],
            ['user_id' => 4, 'service_id' => 1, 'appointment_date' => '2026-06-10 11:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 5, 'service_id' => 2, 'appointment_date' => '2026-06-11 09:00:00', 'status' => 'confirmed', 'notes' => ''],
            ['user_id' => 6, 'service_id' => 3, 'appointment_date' => '2026-06-11 10:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 7, 'service_id' => 1, 'appointment_date' => '2026-06-12 09:00:00', 'status' => 'confirmed', 'notes' => ''],
            ['user_id' => 8, 'service_id' => 4, 'appointment_date' => '2026-06-12 10:30:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 9, 'service_id' => 5, 'appointment_date' => '2026-06-13 09:00:00', 'status' => 'confirmed', 'notes' => ''],
            ['user_id' => 10, 'service_id' => 2, 'appointment_date' => '2026-06-13 11:00:00', 'status' => 'pending', 'notes' => ''],
            ['user_id' => 2, 'service_id' => 3, 'appointment_date' => '2026-06-14 09:00:00', 'status' => 'confirmed', 'notes' => ''],
            ['user_id' => 3, 'service_id' => 1, 'appointment_date' => '2026-06-14 10:00:00', 'status' => 'pending', 'notes' => ''],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }
    }
}