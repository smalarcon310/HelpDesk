@extends('layouts.app')
@section('content')
<h3 class="mb-3">Dashboard Administrativo</h3>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card p-3"><div class="text-muted small">Total Tickets</div><div class="fs-2 fw-bold">{{ $total }}</div></div></div>
    @foreach(['pendiente'=>'warning','en_proceso'=>'primary','resuelto'=>'success','cerrado'=>'secondary'] as $key => $color)
        <div class="col-md-2"><div class="card p-3"><div class="text-muted small text-capitalize">{{ str_replace('_', ' ', $key) }}</div><div class="fs-2 fw-bold text-{{ $color }}">{{ $byStatus[$key] ?? 0 }}</div></div></div>
    @endforeach
</div>
<div class="card"><div class="card-body"><h5>Tickets por técnico</h5><ul class="mb-0">@forelse($byTecnico as $row)<li>{{ $row->tecnico?->name ?? 'Sin asignar' }}: {{ $row->total }}</li>@empty<li class="text-muted">Sin datos</li>@endforelse</ul></div></div>
@endsection
