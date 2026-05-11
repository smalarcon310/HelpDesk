<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Desk - Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #0f4c35 0%, #143f30 55%, #0b2a20 100%); min-height: 100vh; }
        .auth-card { max-width: 420px; border: 0; box-shadow: 0 30px 60px rgba(0,0,0,.18); }
        .brand { color: #0f4c35; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="card auth-card rounded-4 overflow-hidden">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
                    <span class="fs-3">⚙</span>
                </div>
                <h1 class="h4 mb-1 brand">Help Desk</h1>
                <p class="text-muted mb-0">Sistema de Tickets Industrial</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-success btn-lg">Iniciar sesión</button>
                </div>
            </form>

            <div class="mt-4 small text-muted">
                Usa el usuario seed: <strong>admin@example.com</strong> / <strong>password</strong>
            </div>
        </div>
    </div>
</body>
</html>
