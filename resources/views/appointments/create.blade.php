@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-plus me-2"></i>Nouveau Rendez-vous</h2>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Patient</label>
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                    <option value="">-- Choisir un patient --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Service</label>
                <select name="service_id" class="form-select @error('service_id') is-invalid @enderror">
                    <option value="">-- Choisir un service --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('service_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Date et Heure</label>
                <input type="datetime-local" name="appointment_date" 
                       class="form-control @error('appointment_date') is-invalid @enderror">
                @error('appointment_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Enregistrer
            </button>
        </form>
    </div>
</div>
@endsection