<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listado de aprendices</title>
</head>
<body>
    <h1>Listado de aprendices</h1>

    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Programa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $aprendiz->id }}</td>
                <td>{{ $aprendiz->nombre }}</td>
                <td>{{ $aprendiz->programa }}</td>
                <td>
                    <a href="{{ url('/aprendices/' . $aprendiz->id . '/editar') }}">Editar</a>
                </td>
                <tr>
                    <form action="{{ url('/aprendices/' . $aprendiz->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No hay aprendices registrados</td>
                </tr>
                @endforelse
        </tbody>
    </table>

    <p><a href="{{ url('/aprendices/crear') }}">Agregar Aprendiz</a></p>
    
    
    
</body>
</html>