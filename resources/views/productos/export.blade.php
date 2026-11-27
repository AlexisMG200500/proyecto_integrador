<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th colspan="5" style="background-color: #0f172a; color: #ffffff; font-size: 14px; font-weight: bold; text-align: left; padding: 10px;">
                        REPORTE DE PRODUCTOS
                    </th>
                </tr>
                <tr>
                    <th colspan="3" style="background-color: #f1f5f9; color: #334155; font-size: 10px; text-align: left; padding: 6px; border: 1px solid #cbd5e1;">
                        Fecha de emisión: {{ now()->format('d/m/Y H:i') }}
                    </th>
                    <th colspan="2" style="background-color: #f1f5f9; color: #334155; font-size: 10px; text-align: right; padding: 6px; border: 1px solid #cbd5e1;">
                        Total de registros: {{ count($productos) }}
                    </th>
                </tr>
                <tr>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: center;">ID</th>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Producto</th>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Serie</th>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Características</th>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Falla</th>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Cantidad</th>
                    <th style="background-color: #1e293b; color: #ffffff; font-weight: bold; border: 1px solid #0f172a; padding: 8px; text-align: left;">Precio</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #334155; font-weight: bold; border: 1px solid #cbd5e1; padding: 6px; text-align: center;">
                            {{ $producto->id }}
                        </td>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #0f172a; border: 1px solid #cbd5e1; padding: 6px;">
                            {{ $producto->producto }}
                        </td>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1e293b; border: 1px solid #cbd5e1; padding: 6px;">
                            {{ $producto->serie }}
                        </td>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #1d4ed8; border: 1px solid #cbd5e1; padding: 6px;">
                            {{ $producto->caracteristicas }}
                        </td>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #475569; border: 1px solid #cbd5e1; padding: 6px;">
                            {{ $producto->falla }}
                        </td>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #475569; border: 1px solid #cbd5e1; padding: 6px;">
                            {{ $producto->cantidad }}
                        </td>
                        <td style="background-color: {{ $loop->even ? '#f8fafc' : '#ffffff' }}; color: #475569; border: 1px solid #cbd5e1; padding: 6px;">
                            {{ $producto->precio }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 12px; color: #64748b; border: 1px solid #cbd5e1;">
                            No hay productos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>