@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-calendar me-2"></i>Rendez-vous</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Nouveau RDV
    </a>
</div>

<!-- Recherche -->
<div class="card mb-4">
    <div class="card-body">
        <input type="text" id="search" class="form-control" 
               placeholder="Rechercher par patient ou service...">
    </div>
</div>

<!-- Table -->
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="appointments-table">
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->user->name }}</td>
                    <td>{{ $appointment->service->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($appointment->status == 'confirmed')
                            <span class="badge bg-success">Confirmé</span>
                        @elseif($appointment->status == 'pending')
                            <span class="badge bg-warning">En attente</span>
                        @else
                            <span class="badge bg-danger">Annulé</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" 
                                onclick="confirmDelete({{ $appointment->id }})">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-{{ $appointment->id }}" 
                              action="{{ route('appointments.destroy', $appointment) }}" 
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $appointments->links() }}
    </div>
</div>

<!-- Modal Confirmation Suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce rendez-vous?
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
// Delete Modal
let deleteId = null;
function confirmDelete(id) {
    deleteId = id;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (deleteId) document.getElementById('delete-' + deleteId).submit();
});

// Recherche Axios
document.getElementById('search').addEventListener('input', function() {
    let search = this.value;
    axios.get('{{ route("appointments.index") }}', { params: { search: search } })
        .then(response => {
            let parser = new DOMParser();
            let doc = parser.parseFromString(response.data, 'text/html');
            document.getElementById('appointments-table').innerHTML = 
                doc.getElementById('appointments-table').innerHTML;
        });
});
</script>
@endsection