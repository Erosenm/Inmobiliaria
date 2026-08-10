<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Gestión de Usuarios / Socios</h2>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">+ Nuevo Usuario</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Gimnasio</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->gimnasio->nombre ?? 'N/A' }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td><span class="badge bg-info text-dark">{{ ucfirst($usuario->rol) }}</span></td>
                    <td>{{ $usuario->telefono ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>