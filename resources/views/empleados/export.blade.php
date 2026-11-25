<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Empleados</title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th colspan="6" style="background-color: #0f172a; color: #ffffff; font-size: 14px; font-weight: bold; text-align: left; padding: 10px;">
                REPORTE DE EMPLEADOS
            </th>
        </tr>
        <tr>
            <th colspan="4" style="background-color: #f1f5f9; color: #334155; font-size: 10px; text-align: left; padding: 6px; border: 1px solid #cbd5e1;">
                Fecha de emisión: {{ now()->format('d/m/Y H:i') }}
            </th>
            <th colspan="2" style="background-color: #f1f5f9; color: #334155; font-size: 10px; text-align: right; padding: 6px; border: 1px solid #cbd5e1;">
                Total de registros: {{ count($empleados) }}
            </th>
        </tr>
        <tr>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: center;">ID</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Nombre</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">A. Paterno</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">A. Materno</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Teléfono</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Dirección</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($empleados as $empleado)
            <tr>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #334155; font-weight: bold; border: 1px solid #cbd5e1; padding: 6px; text-align: center;">
                    {{ $empleado->id }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #0f172a; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $empleado->nombre }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1e293b; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $empleado->apellido_paterno }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1e293b; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $empleado->apellido_materno }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1d4ed8; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $empleado->telefono }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #475569; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $empleado->direccion }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 12px; color: #64748b; border: 1px solid #cbd5e1;">
                    No hay empleados registrados.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>