<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['user', 'service']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('service', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $appointments = $query->latest()->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $services = Service::all();
        $users = User::all();
        return view('appointments.create', compact('services', 'users'));
    }

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
    
        // Envoyer email
        Mail::to($appointment->user->email)
            ->send(new AppointmentConfirmation($appointment));
    
        return redirect()->route('appointments.index')
            ->with('success', 'Rendez-vous créé avec succès!');
    }

    public function edit(Appointment $appointment)
    {
        $services = Service::all();
        $users = User::all();
        return view('appointments.edit', compact('appointment', 'services', 'users'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')
            ->with('success', 'Rendez-vous modifié avec succès!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')
            ->with('success', 'Rendez-vous supprimé!');
    }
}