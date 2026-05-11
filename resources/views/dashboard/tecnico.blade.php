@extends('layouts.app')
@section('content')
<h3 class="mb-3">Dashboard Técnico</h3>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card p-3"><div class="text-muted small">Asignados a mí</div><div class="fs-2 fw-bold">{{ $assigned }}</div></div></div>
    @foreach(['pendiente'=>'warning','en_proceso'=>'primary','resuelto'=>'success','cerrado'=>'secondary'] as $key => $color)
        <div class="col-md-2"><div class="card p-3"><div class="text-muted small text-capitalize">{{ str_replace('_', ' ', $key) }}</div><div class="fs-2 fw-bold text-{{ $color }}">{{ $byStatus[$key] ?? 0 }}</div></div></div>
    @endforeach
</div>
<div class="card"><div class="card-body"><h5>Mis tickets</h5><ul class="mb-0">@forelse($tickets as $ticket)<li><a href="{{ route('tickets.show', $ticket) }}">#{{ $ticket->id }} - {{ $ticket->title }}</a></li>@empty<li class="text-muted">Sin tickets</li>@endforelse</ul></div></div>
@endsection
