@extends('layouts.app')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>Total Rendez-vous</h6>
                    <h2>{{ \App\Models\Appointment::count() }}</h2>
                </div>
                <i class="fas fa-calendar fa-3x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>Confirmés</h6>
                    <h2>{{ \App\Models\Appointment::where('status','confirmed')->count() }}</h2>
                </div>
                <i class="fas fa-check-circle fa-3x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>En attente</h6>
                    <h2>{{ \App\Models\Appointment::where('status','pending')->count() }}</h2>
                </div>
                <i class="fas fa-clock fa-3x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-calendar me-2"></i>Derniers Rendez-vous</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Appointment::with(['user','service'])->latest()->take(5)->get() as $apt)
                <tr>
                    <td>{{ $apt->user->name }}</td>
                    <td>{{ $apt->service->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($apt->appointment_date)->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($apt->status == 'confirmed')
                            <span class="badge bg-success">Confirmé</span>
                        @elseif($apt->status == 'pending')
                            <span class="badge bg-warning">En attente</span>
                        @else
                            <span class="badge bg-danger">Annulé</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection