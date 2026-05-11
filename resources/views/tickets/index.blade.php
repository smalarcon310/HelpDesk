@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Tickets</h3>
    <a href="{{ route('tickets.create') }}" class="btn btn-success">Nuevo Ticket</a>
</div>
<div class="card"><div class="card-body table-responsive">
<table class="table align-middle">
    <thead><tr><th>ID</th><th>Título</th><th>Categoría</th><th>Prioridad</th><th>Estado</th><th>Técnico</th><th>Acciones</th></tr></thead>
    <tbody>
    @forelse($tickets as $ticket)
        <tr>
            <td>#{{ $ticket->id }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->category }}</td>
            <td><span class="badge bg-{{ $ticket->priority === 'alta' ? 'danger' : ($ticket->priority === 'media' ? 'warning' : 'success') }}">{{ $ticket->priority }}</span></td>
            <td>{{ $ticket->status }}</td>
            <td>{{ $ticket->tecnico?->name ?? 'Sin asignar' }}</td>
            <td><a class="btn btn-sm btn-outline-primary" href="{{ route('tickets.show', $ticket) }}">Ver</a></td>
        </tr>
    @empty
        <tr><td colspan="7" class="text-muted">No hay tickets</td></tr>
    @endforelse
    </tbody>
</table>
{{ $tickets->links() }}
</div></div>
@endsection
