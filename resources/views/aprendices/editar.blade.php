<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Aprendiz</title>

</head>
<body>
    <h1>Editar Aprendiz #{{ $aprendiz->id }}</h1>

    <form action="{{ url('/aprendices/' . $aprendiz->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label for="nombre">Nombre del Aprendiz:</label>
            <input type="text" id="nombre" name="nombre"
            value="{{ old('nombre', $aprendiz->nombre) }}"
            maxlength="100" required>
            @error('nombre')
            <span>{{ $message }}</span>
            @enderror
        </p>
        <button type="submit">guardar cambios</button>
    </form>
    <p><a href="{{ url('/aprendices') }}">Volver al listado de aprendices</a></p>
</body>
</html>