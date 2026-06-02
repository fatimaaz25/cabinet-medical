@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-edit me-2"></i>Modifier Rendez-vous</h2>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('appointments.update', $appointment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Patient</label>
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                    <option value="">-- Choisir un patient --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ $appointment->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Service</label>
                <select name="service_id" class="form-select @error('service_id') is-invalid @enderror">
                    <option value="">-- Choisir un service --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}"
                            {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                @error('service_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Date et Heure</label>
                <input type="datetime-local" name="appointment_date" 
                       value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}"
                       class="form-control @error('appointment_date') is-invalid @enderror">
                @error('appointment_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>
                        En attente
                    </option>
                    <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>
                        Confirmé
                    </option>
                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>
                        Annulé
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="3">{{ $appointment->notes }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">
                <i class="fas fa-save me-2"></i>Modifier
            </button>
        </form>
    </div>
</div>
@endsection