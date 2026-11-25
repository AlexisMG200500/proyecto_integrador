<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos - SIPRO</title>
    <style>
        /* Configuración de página para PDF (DomPDF - A4 Horizontal) */
        @page {
            margin: 1.5cm 1.5cm 2cm 1.5cm;
        }

        body {
            font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
            color: #1e293b;
            font-size: 10.5px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        /* Marca de agua sutil sin afectar la legibilidad del texto */
        .watermark {
            position: fixed;
            top: 28%;
            left: 35%;
            width: 30%;
            opacity: 0.05;
            z-index: -1000;
            text-align: center;
        }

        /* Cabecera corporativa */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 2.5px solid #1e3a8a;
            padding-bottom: 10px;
            margin-bottom: 16px;
        }

        .header-table td {
            vertical-align: middle;
            border: none;
            padding: 0;
        }

        .logo-cell {
            width: 85px;
        }

        .logo-cell img {
            width: 72px;
            height: auto;
        }

        .title-cell {
            padding-left: 10px;
        }

        .title-cell h1 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .title-cell p {
            margin: 2px 0 0 0;
            font-size: 10px;
            color: #64748b;
        }

        .meta-cell {
            text-align: right;
            width: 165px;
        }

        .badge-fecha {
            display: inline-block;
            background-color: #f1f5f9;
            border: 1px solid #cbd5e1;
            color: #334155;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 9.5px;
        }

        .badge-fecha strong {
            color: #1e3a8a;
        }

        /* Resumen superior */
        .summary-bar {
            background-color: #f8fafc;
            border-left: 3.5px solid #1e3a8a;
            padding: 7px 12px;
            margin-bottom: 14px;
            font-size: 10px;
            color: #334155;
        }

        /* Tabla principal de productos */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            display: table-header-group;
        }

        .data-table th {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: 700;
            text-align: left;
            padding: 8px 9px;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: 1px solid #1e3a8a;
        }

        .data-table td {
            padding: 7px 9px;
            border-bottom: 1px solid #e2e8f0;
            border-left: 1px solid #f1f5f9;
            border-right: 1px solid #f1f5f9;
            color: #334155;
            vertical-align: middle;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .col-center {
            text-align: center !important;
        }

        .col-right {
            text-align: right !important;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 20px;
            color: #64748b;
            font-style: italic;
        }

        /* Pie de página fijo */
        .footer {
            position: fixed;
            bottom: -1.2cm;
            left: 0;
            right: 0;
            height: 1cm;
            border-top: 1px solid #cbd5e1;
            padding-top: 6px;
            font-size: 8.5px;
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

    <!-- Marca de agua -->
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
                <h1>Reporte General de Productos</h1>
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

    <!-- Resumen -->
    <div class="summary-bar">
        <strong>Total de registros encontrados:</strong> {{ count($productos) }} producto(s) registrado(s).
    </div>

    <!-- Tabla de productos -->
    <table class="data-table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Serie</th>
                <th>Característica</th>
                <th>Falla</th>
                <th class="col-center">Cantidad</th>
                <th class="col-right">Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $pro)
                <tr>
                    <td><strong>{{ $pro->producto }}</strong></td>
                    <td>{{ $pro->serie ?? 'N/A' }}</td>
                    <td>{{ $pro->caracteristicas ?? 'Sin especificar' }}</td>
                    <td>{{ $pro->falla ?? 'Sin falla reportada' }}</td>
                    <td class="col-center">{{ $pro->cantidad }}</td>
                    <td class="col-right">${{ number_format((float) $pro->precio, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty-state">
                        No hay productos registrados para mostrar en este reporte.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pie de página -->
    <div class="footer">
        <table class="footer-table">
            <tr>
                <td style="text-align: left;">Documento de control interno — SIPRO</td>
                <td style="text-align: right;"><span class="page-number"></span></td>
            </tr>
        </table>
    </div>

</body>
</html>