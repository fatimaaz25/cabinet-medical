<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentApiController extends Controller
{
    // GET /api/appointments
    public function index()
    {
        $appointments = Appointment::with(['user', 'service'])->get();
        return response()->json($appointments);
    }

    // POST /api/appointments
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::create($request->all());
        $appointment->load(['user', 'service']);

        return response()->json($appointment, 201);
    }
}