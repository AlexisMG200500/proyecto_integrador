<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte USUARIOS PDF</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
                margin: 24px 30px;
                color: #111827;
            }

            .header-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 8px;
            }

            .header-table td {
                vertical-align: middle;
                border: none;
            }

            .logo-cell {
                width: 90px;
            }

            .title-cell {
                text-align: center;
            }

            .title-cell h1 {
                margin: 0;
                font-size: 20px;
                color: #e84118;
            }

            .date-cell {
                width: 110px;
                text-align: right;
                font-size: 12px;
            }

            hr {
                border: none;
                height: 3px;
                background-color: red;
                margin: 10px 0 18px 0;
            }

            .data-table {
                width: 90%;
                margin: 0 auto;
                border-collapse: collapse;
                background: #26de81;
                font-size: 12px;
            }

            .data-table th {
                background: #e84118;
                color: white;
                padding: 8px 10px;
                border: 1px solid #374151;
                text-align: left;
            }

            .data-table td {
                background: #f5f6fa;
                color: black;
                padding: 7px 10px;
                border: 1px solid #374151;
                word-break: break-word;
            }

            .data-table tr {
                page-break-inside: avoid;
            }
        </style>
    </head>
    <body>
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <img src="{{ public_path('sipro.jpg') }}" width="80" height="70" alt="Logo SIPRO">
                </td>
                <td class="title-cell">
                    <h1>REPORTE DE USUARIOS</h1>
                </td>
                <td class="date-cell">
                    <b>{{ date('d/m/Y') }}</b>
                </td>
            </tr>
        </table>

        <hr>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->usuario }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->password }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>