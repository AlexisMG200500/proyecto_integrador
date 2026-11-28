<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>

<table>
    <thead>
        <tr>
            <th colspan="6" style="background-color: #0f172a; color: #ffffff; font-size: 14px; font-weight: bold; text-align: left; padding: 10px;">
                REPORTE GENERAL DE VENTAS — SIPRO
            </th>
        </tr>
        <tr>
            <th colspan="4" style="background-color: #f1f5f9; color: #334155; font-size: 10px; text-align: left; padding: 6px; border: 1px solid #cbd5e1;">
                Fecha de emisión: {{ now()->format('d/m/Y H:i') }} hrs
            </th>
            <th colspan="2" style="background-color: #f1f5f9; color: #334155; font-size: 10px; text-align: right; padding: 6px; border: 1px solid #cbd5e1;">
                Total de registros: {{ count($ventas) }}
            </th>
        </tr>
        <tr>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Venta</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: center;">Cantidad</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: right;">Precio</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Características</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Descripción</th>
            <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Cliente</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalCantidad = 0;
            $totalImporte = 0;
        @endphp

        @forelse ($ventas as $ven)
            @php
                $cantidad = (float) $ven->cantidad;
                $precio = (float) $ven->precio;
                $totalCantidad += $cantidad;
                $totalImporte += ($cantidad * $precio);
            @endphp
            <tr>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #0f172a; font-weight: bold; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $ven->venta }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #334155; border: 1px solid #cbd5e1; padding: 6px; text-align: center;">
                    {{ $ven->cantidad }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1d4ed8; border: 1px solid #cbd5e1; padding: 6px; text-align: right;">
                    ${{ number_format($precio, 2) }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #334155; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $ven->caracteristicas ?? 'Sin especificar' }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #475569; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $ven->descripcion ?? 'Sin descripción' }}
                </td>
                <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1e293b; border: 1px solid #cbd5e1; padding: 6px;">
                    {{ $ven->cliente ?? 'N/A' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 12px; color: #64748b; border: 1px solid #cbd5e1;">
                    No hay ventas registradas para mostrar en este reporte.
                </td>
            </tr>
        @endforelse

        @if (count($ventas) > 0)
            <tr>
                <td style="background-color: #f1f5f9; color: #0f172a; font-weight: bold; border-top: 2px solid #0f172a; border-bottom: 2px solid #0f172a; border-left: 1px solid #cbd5e1; border-right: 1px solid #cbd5e1; padding: 7px;">
                    TOTAL
                </td>
                <td style="background-color: #f1f5f9; color: #0f172a; font-weight: bold; border-top: 2px solid #0f172a; border-bottom: 2px solid #0f172a; border-left: 1px solid #cbd5e1; border-right: 1px solid #cbd5e1; padding: 7px; text-align: center;">
                    {{ $totalCantidad }}
                </td>
                <td style="background-color: #f1f5f9; color: #0f172a; font-weight: bold; border-top: 2px solid #0f172a; border-bottom: 2px solid #0f172a; border-left: 1px solid #cbd5e1; border-right: 1px solid #cbd5e1; padding: 7px; text-align: right;">
                    ${{ number_format($totalImporte, 2) }}
                </td>
                <td colspan="3" style="background-color: #f1f5f9; border-top: 2px solid #0f172a; border-bottom: 2px solid #0f172a; border-left: 1px solid #cbd5e1; border-right: 1px solid #cbd5e1; padding: 7px;"></td>
            </tr>
        @endif
    </tbody>
</table>

</body>
</html>