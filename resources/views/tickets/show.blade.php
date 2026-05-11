@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h3 class="mb-1">#{{ $ticket->id }} - {{ $ticket->title }}</h3>
        <div class="text-muted">{{ $ticket->category }} · {{ $ticket->priority }} · {{ $ticket->status }}</div>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-outline-primary btn-sm">Editar</a>
    </div>
</div>
<div class="card mb-3"><div class="card-body"><p class="mb-0">{{ $ticket->description }}</p></div></div>

@can('assign', $ticket)
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('tickets.assign', $ticket) }}" class="row g-2 align-items-end">@csrf
        <div class="col-md-6">
            <label class="form-label">Asignar técnico</label>
            <select name="tecnico_id" class="form-select">
                <option value="">Sin asignar</option>
                @foreach(App\Models\User::where('role','tecnico')->get() as $tech)
                    <option value="{{ $tech->id }}" @selected($ticket->tecnico_id === $tech->id)>{{ $tech->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3"><button class="btn btn-warning">Guardar</button></div>
    </form>
</div></div>
@endcan

@can('changeStatus', $ticket)
<div class="card mb-3"><div class="card-body">
    <form method="POST" action="{{ route('tickets.changeStatus', $ticket) }}" class="row g-2 align-items-end">@csrf
        <div class="col-md-6">
            <label class="form-label">Cambiar estado</label>
            <select name="status" class="form-select">
                @foreach(['pendiente','en_proceso','resuelto','cerrado'] as $status)
                    <option value="{{ $status }}" @selected($ticket->status === $status)>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3"><button class="btn btn-success">Actualizar</button></div>
    </form>
</div></div>
@endcan

<div class="card mb-3"><div class="card-body">
    <h5>Comentarios</h5>
    @foreach($ticket->comments as $comment)
        <div class="border rounded p-2 mb-2"><strong>{{ $comment->user->name }}</strong> <span class="text-muted small">({{ $comment->user->role }})</span><div>{{ $comment->body }}</div></div>
    @endforeach
    <form method="POST" action="{{ route('tickets.comments.store', $ticket) }}" class="mt-3">@csrf
        <textarea name="body" class="form-control mb-2" rows="3" placeholder="Escribe un comentario"></textarea>
        <button class="btn btn-primary">Comentar</button>
    </form>
</div></div>

<div class="card"><div class="card-body">
    <h5>Historial</h5>
    @include('components.timeline', ['items' => $ticket->histories])
</div></div>
@endsection
