@extends('layouts.app')
@section('content')
<h3 class="mb-3">Nuevo Ticket</h3>
<form method="POST" action="{{ route('tickets.store') }}" class="card card-body">
    @csrf
    <div class="mb-3"><label class="form-label">Título</label><input name="title" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Descripción</label><textarea name="description" class="form-control" rows="5" required></textarea></div>
    <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Categoría</label><select name="category" class="form-select"><option value="hardware">hardware</option><option value="software">software</option><option value="red">red</option><option value="mantenimiento">mantenimiento</option><option value="otro" selected>otro</option></select></div>
        <div class="col-md-4"><label class="form-label">Prioridad</label><select name="priority" class="form-select"><option value="alta">alta</option><option value="media" selected>media</option><option value="baja">baja</option></select></div>
    </div>
    <div class="mt-3"><button class="btn btn-success">Crear</button></div>
</form>
@endsection
