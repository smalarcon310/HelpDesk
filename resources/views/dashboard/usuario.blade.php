@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Mis Tickets</h2>
        <p class="text-muted mb-0">Gestiona y da seguimiento a tus solicitudes de soporte</p>
    </div>
    <a href="{{ route('tickets.create') }}" class="btn btn-success">Nuevo Ticket</a>
</div>

<div class="row g-3 mb-4">
    @foreach([
        'pendiente' => ['label' => 'Pendiente', 'class' => 'warning'],
        'en_proceso' => ['label' => 'En Proceso', 'class' => 'primary'],
        'resuelto' => ['label' => 'Resuelto', 'class' => 'success'],
        'cerrado' => ['label' => 'Cerrado', 'class' => 'secondary'],
    ] as $key => $meta)
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="small text-muted">{{ $meta['label'] }}</div>
                    <div class="display-6 fw-bold text-{{ $meta['class'] }}">{{ $byStatus[$key] ?? 0 }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 pt-3">
        <h5 class="mb-0">Historial Reciente</h5>
    </div>
    <div class="card-body pt-2">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th>Prioridad</th>
                        <th>Técnico</th>
                        <th>Último Comentario</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($myTickets as $ticket)
                        @php $latestComment = $ticket->comments->first(); @endphp
                        <tr>
                            <td>#{{ $ticket->id }}</td>
                            <td class="fw-semibold">{{ $ticket->title }}</td>
                            <td>
                                <span class="badge bg-{{ $ticket->status === 'pendiente' ? 'warning text-dark' : ($ticket->status === 'en_proceso' ? 'primary' : ($ticket->status === 'resuelto' ? 'success' : 'secondary')) }}">
                                    {{ str_replace('_', ' ', $ticket->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $ticket->priority === 'alta' ? 'danger' : ($ticket->priority === 'media' ? 'warning text-dark' : 'success') }}">
                                    {{ $ticket->priority }}
                                </span>
                            </td>
                            <td>{{ $ticket->tecnico?->name ?? 'Sin asignar' }}</td>
                            <td class="text-muted small">{{ $latestComment?->body ? \Illuminate\Support\Str::limit($latestComment->body, 45) : 'Sin comentarios' }}</td>
                            <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">No hay tickets registrados todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
