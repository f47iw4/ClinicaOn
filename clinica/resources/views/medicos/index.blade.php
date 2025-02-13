<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Médicos</title>
</head>
<body>
    <h1>Lista de Médicos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Número de Colegiado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->apellidos }}</td>
                <td>{{ $medico->n_colegiado }}</td>
                <td><a href="{{ route('medicos.show', $medico->id) }}">Más detalles</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
