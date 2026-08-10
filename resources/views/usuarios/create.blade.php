<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h3 class="mb-3">Registrar Nuevo Usuario</h3>

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Gimnasio</label>
                <select name="gimnasio_id" class="form-select" required>
                    @foreach($gimnasios as $gimnasio)
                        <option value="{{ $gimnasio->id }}">{{ $gimnasio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre Completo</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="rol" class="form-select" required>
                    <option value="socio">Socio / Cliente</option>
                    <option value="recepcionista">Recepcionista</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono (Opcional)</label>
                <input type="text" name="telefono" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Guardar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>