@extends('layouts.app')
@section('content')
<h3 class="mb-3">Editar usuario</h3>
<form method="POST" action="{{ route('users.update', $user) }}" class="card card-body">@csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Nombre</label><input name="name" class="form-control" value="{{ old('name', $user->name) }}" required></div>
    <div class="mb-3"><label class="form-label">Email</label><input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required></div>
    <div class="mb-3"><label class="form-label">Rol</label><select name="role" class="form-select">@foreach($roles as $role)<option value="{{ $role }}" @selected($user->role === $role)>{{ $role }}</option>@endforeach</select></div>
    <div class="mb-3"><label class="form-label">Nuevo password</label><input name="password" type="password" class="form-control"></div>
    <div class="mb-3"><label class="form-label">Confirmar nuevo password</label><input name="password_confirmation" type="password" class="form-control"></div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
