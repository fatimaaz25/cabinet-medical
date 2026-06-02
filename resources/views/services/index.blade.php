@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-stethoscope me-2"></i>Services</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="fas fa-plus me-2"></i>Nouveau Service
    </button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Durée (min)</th>
                    <th>Prix (DH)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->duration }}</td>
                    <td>{{ $service->price }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger"
                                onclick="confirmDelete({{ $service->id }})">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-{{ $service->id }}"
                              action="{{ route('services.destroy', $service) }}"
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Création -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Nouveau Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Durée (minutes)</label>
                        <input type="number" name="duration" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prix (DH)</label>
                        <input type="number" name="price" class="form-control" step="0.01">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce service?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let deleteId = null;
function confirmDelete(id) {
    deleteId = id;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (deleteId) document.getElementById('delete-' + deleteId).submit();
});
</script>
@endsection