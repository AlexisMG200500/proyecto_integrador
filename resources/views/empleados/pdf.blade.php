<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Empleados - SIPRO</title>
        <style>
            /* Configuración de página para PDF (DomPDF / Snappy) */
            @page {
                margin: 1.5cm 1.5cm 2cm 1.5cm;
            }

            body {
                font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
                color: #1e293b;
                font-size: 11px;
                line-height: 1.4;
                margin: 0;
                padding: 0;
                background-color: #ffffff;
            }

            /* Marca de agua sutil opcional en el fondo */
            .watermark {
                position: fixed;
                top: 35%;
                left: 25%;
                width: 50%;
                opacity: 0.05;
                z-index: -1000;
                text-align: center;
            }

            /* Cabecera corporativa estructurada con tabla para máxima compatibilidad en PDF */
            .header-table {
                width: 100%;
                border-collapse: collapse;
                border-bottom: 2.5px solid #1e3a8a;
                padding-bottom: 12px;
                margin-bottom: 20px;
            }

            .header-table td {
                vertical-align: middle;
                border: none;
                padding: 0;
            }

            .logo-cell {
                width: 90px;
            }

            .logo-cell img {
                width: 75px;
                height: auto;
            }

            .title-cell {
                padding-left: 12px;
            }

            .title-cell h1 {
                margin: 0;
                font-size: 18px;
                font-weight: 700;
                color: #0f172a;
                letter-spacing: 0.5px;
                text-transform: uppercase;
            }

            .title-cell p {
                margin: 3px 0 0 0;
                font-size: 10.5px;
                color: #64748b;
            }

            .meta-cell {
                text-align: right;
                width: 160px;
            }

            .badge-fecha {
                display: inline-block;
                background-color: #f1f5f9;
                border: 1px solid #cbd5e1;
                color: #334155;
                padding: 5px 10px;
                border-radius: 4px;
                font-size: 10px;
            }

            .badge-fecha strong {
                color: #1e3a8a;
            }

            /* Resumen superior */
            .summary-bar {
                background-color: #f8fafc;
                border-left: 3.5px solid #1e3a8a;
                padding: 8px 12px;
                margin-bottom: 18px;
                font-size: 10.5px;
                color: #334155;
            }

            /* Tabla principal de datos */
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 5px;
            }

            .data-table thead {
                display: table-header-group; /* Repite el encabezado si el PDF tiene varias páginas */
            }

            .data-table th {
                background-color: #1e3a8a;
                color: #ffffff;
                font-weight: 700;
                text-align: left;
                padding: 9px 10px;
                font-size: 9.5px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border: 1px solid #1e3a8a;
            }

            .data-table td {
                padding: 8px 10px;
                border-bottom: 1px solid #e2e8f0;
                border-left: 1px solid #f1f5f9;
                border-right: 1px solid #f1f5f9;
                color: #334155;
                vertical-align: middle;
            }

            .data-table tbody tr:nth-child(even) {
                background-color: #f8fafc;
            }

            .col-id {
                width: 6%;
                text-align: center !important;
                font-weight: 700;
                color: #1e3a8a !important;
            }

            .col-tel {
                width: 15%;
                white-space: nowrap;
            }

            .empty-state {
                text-align: center;
                padding: 25px;
                color: #64748b;
                font-style: italic;
            }

            /* Pie de página fijo en todas las hojas */
            .footer {
                position: fixed;
                bottom: -1.2cm;
                left: 0;
                right: 0;
                height: 1cm;
                border-top: 1px solid #cbd5e1;
                padding-top: 6px;
                font-size: 9px;
                color: #64748b;
            }

            .footer-table {
                width: 100%;
                border-collapse: collapse;
            }

            .footer-table td {
                border: none;
                padding: 0;
            }

            .page-number:before {
                content: "Página " counter(page);
            }
        </style>
    </head>
    <body>

        <!-- Marca de agua (usa public_path en Laravel para que DomPDF cargue la imagen) -->
        <div class="watermark">
            <img src="{{ public_path('sipro.jpg') }}" style="width: 100%;" alt="">
        </div>

        <!-- Encabezado -->
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <img src="{{ public_path('sipro.jpg') }}" alt="Logo SIPRO">
                </td>
                <td class="title-cell">
                    <h1>Reporte General de Empleados</h1>
                    <p>Sistema Integral de Gestión de Personal — SIPRO</p>
                </td>
                <td class="meta-cell">
                    <div class="badge-fecha">
                        <strong>Fecha:</strong> {{ date('d/m/Y') }}<br>
                        <strong>Hora:</strong> {{ date('H:i') }} hrs
                    </div>
                </td>
            </tr>
        </table>

        <!-- Barra de resumen informativo -->
        <div class="summary-bar">
            <strong>Total de registros encontrados:</strong> {{ count($empleados) }} empleado(s) activo(s) en el padrón.
        </div>

        <!-- Tabla de empleados -->
        <table class="data-table">
            <thead>
                <tr>
                    <th class="col-id">ID</th>
                    <th>Nombre(s)</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th class="col-tel">Teléfono</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($empleados as $empleado)
                    <tr>
                        <td class="col-id">{{ $empleado->id }}</td>
                        <td><strong>{{ $empleado->nombre }}</strong></td>
                        <td>{{ $empleado->apellido_paterno }}</td>
                        <td>{{ $empleado->apellido_materno }}</td>
                        <td class="col-tel">{{ $empleado->telefono ?? 'N/A' }}</td>
                        <td>{{ $empleado->direccion ?? 'Sin dirección registrada' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            No hay empleados registrados para mostrar en este reporte.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pie de página -->
        <div class="footer">
            <table class="footer-table">
                <tr>
                    <td style="text-align: left;">Documento confidencial de uso interno — SIPRO</td>
                    <td style="text-align: right;"><span class="page-number"></span></td>
                </tr>
            </table>
        </div>

    </body>
</html>