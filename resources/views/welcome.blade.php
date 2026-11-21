<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro aprendiz</title>
</head>
<body>
    <h1>Registro de Aprendiz</h1>
    <form action="{{ url('/aprendices') }}" method="POST">
      <div>
        <label for="nombre">Nombre:</label>
        <input
        type="text"
        id="nombre"
        name="nombre"
        value="{{ old('nombre') }}"
        required>
        @error('nombre')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>
      <br>
      <div>
        <label for="programa">Programa:</label>
        <input
        type="text"
        id="programa"
        name="programa"
        value="{{ old('programa') }}"
        required>
        @error('programa')
        <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>
        <br>
        <button type="submit">presentar aprendiz</button>

        <p><a href="{{ url('/aprendices') }}">Ver aprendices registrados</a></p>
    </form>

</body>
</html>