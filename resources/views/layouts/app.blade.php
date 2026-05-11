<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Help Desk') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:#f5f5f5;font-family:Inter,system-ui,sans-serif}
        .sidebar{background:#0f4c35;color:#fff;min-height:100vh;width:240px}
        .sidebar a{color:#e9f5ee;text-decoration:none;display:block;padding:.5rem .75rem;border-radius:.5rem}
        .sidebar a:hover{background:rgba(255,255,255,.08)}
        .topbar{background:#fff;border-bottom:1px solid #e5e7eb}
    </style>
</head>
<body>
<div class="d-flex">
    <aside class="sidebar p-3">
        <div class="fw-bold fs-5">Help Desk</div>
        <div class="small opacity-75 mb-3">Sistema Industrial</div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('tickets.index') }}">Tickets</a>
        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('users.index') }}">Usuarios</a>
        @endif
    </aside>
    <main class="flex-fill">
        <div class="topbar d-flex justify-content-between align-items-center px-4 py-3">
            <div class="fw-semibold">Sistema de Tickets</div>
            @auth
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end small">
                        <div class="fw-semibold">{{ auth()->user()->name }}</div>
                        <div class="text-muted text-capitalize">{{ auth()->user()->role }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-outline-secondary btn-sm">Cerrar sesión</button></form>
                </div>
            @endauth
        </div>
        <div class="p-4">
            @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
