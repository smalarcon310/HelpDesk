@extends('layouts.app')
@section('content')
<h3 class="mb-3">Editar Ticket #{{ $ticket->id }}</h3>
<form method="POST" action="{{ route('tickets.update', $ticket) }}" class="card card-body">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Título</label><input name="title" class="form-control" value="{{ old('title', $ticket->title) }}" required></div>
    <div class="mb-3"><label class="form-label">Descripción</label><textarea name="description" class="form-control" rows="5" required>{{ old('description', $ticket->description) }}</textarea></div>
    <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Categoría</label><input name="category" class="form-control" value="{{ old('category', $ticket->category) }}" required></div>
        <div class="col-md-4"><label class="form-label">Prioridad</label><input name="priority" class="form-control" value="{{ old('priority', $ticket->priority) }}" required></div>
    </div>
    <div class="mt-3"><button class="btn btn-primary">Guardar</button></div>
</form>
@endsection
