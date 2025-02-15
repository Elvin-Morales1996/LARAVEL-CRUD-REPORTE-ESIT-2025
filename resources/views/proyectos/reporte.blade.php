<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Proyectos</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Gobierno de El Salvador</h2>
    <h3>Nombre de la Institución</h3>
    <p>Fecha: {{ now()->format('d/m/Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Proyecto</th>
                <th>Fuente de Fondos</th>
                <th>Monto Planificado</th>
                <th>Monto Patrocinado</th>
                <th>Monto Fondos Propios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ $proyecto->fuentes_fondos }}</td>
                    <td>${{ number_format($proyecto->monto_planificado, 2) }}</td>
                    <td>${{ number_format($proyecto->monto_patrocinado, 2) }}</td>
                    <td>${{ number_format($proyecto->fondos_propios, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
