@extends('layouts.app')
@section('content')
<h3 class="mb-3">Crear usuario</h3>
<form method="POST" action="{{ route('users.store') }}" class="card card-body">@csrf
    <div class="mb-3"><label class="form-label">Nombre</label><input name="name" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input name="email" type="email" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Rol</label><select name="role" class="form-select">@foreach($roles as $role)<option value="{{ $role }}">{{ $role }}</option>@endforeach</select></div>
    <div class="mb-3"><label class="form-label">Password</label><input name="password" type="password" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Confirmar password</label><input name="password_confirmation" type="password" class="form-control" required></div>
    <button class="btn btn-success">Guardar</button>
</form>
@endsection
