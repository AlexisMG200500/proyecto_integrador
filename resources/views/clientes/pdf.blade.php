<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Clientes</title>
        <style>
            @page {
                margin: 25px 30px;
            }

            body {
                font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif;
                font-size: 11px;
                color: #2d3748;
                margin: 0;
                padding: 0;
                line-height: 1.4;
            }

            /* Encabezado del reporte */
            .header-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 12px;
            }

            .header-table td {
                border: none;
                background: transparent;
                padding: 0;
                vertical-align: middle;
            }

            .logo-cell {
                width: 90px;
            }

            .logo-img {
                max-width: 80px;
                max-height: 70px;
                display: block;
            }

            .title-cell h1 {
                margin: 0;
                font-size: 18px;
                color: #1a365d;
                letter-spacing: 0.5px;
                text-transform: uppercase;
            }

            .title-cell p {
                margin: 2px 0 0;
                font-size: 10px;
                color: #718096;
            }

            .meta-cell {
                text-align: right;
                font-size: 10px;
                color: #4a5568;
                white-space: nowrap;
            }

            .meta-cell strong {
                color: #1a202c;
            }

            .divider {
                border: 0;
                border-top: 2px solid #2b6cb0;
                margin: 10px 0 18px;
            }

            /* Tabla principal de datos */
            .data-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
                word-wrap: break-word;
            }

            .data-table thead {
                display: table-header-group;
            }

            .data-table th {
                background-color: #1a365d;
                color: #ffffff;
                font-weight: bold;
                text-align: left;
                padding: 8px 7px;
                font-size: 10px;
                text-transform: uppercase;
                letter-spacing: 0.3px;
                border: 1px solid #1a365d;
            }

            .data-table td {
                padding: 7px;
                border: 1px solid #cbd5e0;
                font-size: 10px;
                color: #2d3748;
                vertical-align: top;
            }

            .data-table tbody tr {
                page-break-inside: avoid;
            }

            .data-table tbody tr:nth-child(even) {
                background-color: #f7fafc;
            }

            .data-table tbody tr:nth-child(odd) {
                background-color: #ffffff;
            }

            /* Anchos sugeridos por columna */
            .col-nombre { width: 15%; }
            .col-ap-pat { width: 14%; }
            .col-ap-mat { width: 14%; }
            .col-email  { width: 21%; }
            .col-tel    { width: 12%; }
            .col-dir    { width: 24%; }

            .empty-row {
                text-align: center;
                padding: 18px;
                color: #718096;
                font-style: italic;
            }
        </style>
    </head>
    <body>

        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <img src="{{ public_path('sipro.jpg') }}" alt="Logo SIPRO" class="logo-img">
                </td>
                <td class="title-cell">
                    <h1>Reporte de Clientes</h1>
                    <p>Listado general de registros activos</p>
                </td>
                <td class="meta-cell">
                    <strong>Fecha de emisión:</strong><br>
                    {{ date('d/m/Y') }}
                </td>
            </tr>
        </table>

        <hr class="divider">

        <table class="data-table">
            <thead>
                <tr>
                    <th class="col-nombre">Nombre</th>
                    <th class="col-ap-pat">A. Paterno</th>
                    <th class="col-ap-mat">A. Materno</th>
                    <th class="col-email">Email</th>
                    <th class="col-tel">Teléfono</th>
                    <th class="col-dir">Dirección</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cli)
                    <tr>
                        <td>{{ $cli->nombre }}</td>
                        <td>{{ $cli->apellido_paterno }}</td>
                        <td>{{ $cli->apellido_materno }}</td>
                        <td>{{ $cli->email }}</td>
                        <td>{{ $cli->telefono }}</td>
                        <td>{{ $cli->direccion }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-row">No hay clientes registrados para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </body>
</html>