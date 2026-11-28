<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            ['Roberto', 'Sánchez', 'Gómez', 'roberto.sanchez@example.com', '5512345601', 'Av. Reforma 120, CDMX'],
            ['Fernanda', 'Morales', 'Ruiz', 'fernanda.morales@example.com', '5512345602', 'Calle Hidalgo 45, Puebla'],
            ['Jorge', 'Castillo', 'Vega', 'jorge.castillo@example.com', '5512345603', 'Av. Juárez 300, Guadalajara'],
            ['Daniela', 'Ortiz', 'Mendoza', 'daniela.ortiz@example.com', '5512345604', 'Calle Morelos 18, Toluca'],
            ['Luis', 'Reyes', 'Navarro', 'luis.reyes@example.com', '5512345605', 'Blvd. Independencia 77, Querétaro'],
            ['Gabriela', 'Jiménez', 'Rojas', 'gabriela.jimenez@example.com', '5512345606', 'Av. Universidad 900, Monterrey'],
            ['Ricardo', 'Vargas', 'Silva', 'ricardo.vargas@example.com', '5512345607', 'Calle Allende 52, Pachuca'],
            ['Paola', 'Romero', 'Aguilar', 'paola.romero@example.com', '5512345608', 'Av. Insurgentes 1500, CDMX'],
            ['Andrés', 'Medina', 'Castro', 'andres.medina@example.com', '5512345609', 'Calle Zaragoza 9, Cuernavaca'],
            ['Mariana', 'Herrera', 'Delgado', 'mariana.herrera@example.com', '5512345610', 'Av. Tecnológico 410, León'],
        ];

        // Se generan 90 clientes más para completar 100 registros
        $nombres = ['Alberto', 'Beatriz', 'César', 'Diana', 'Eduardo', 'Elena', 'Francisco', 'Guadalupe', 'Hugo', 'Isabel',
            'Javier', 'Karla', 'Leonardo', 'Mónica', 'Nicolás', 'Olivia', 'Pablo', 'Rosa', 'Sergio', 'Teresa'];
        $apellidos = ['García', 'Hernández', 'López', 'Martínez', 'González', 'Pérez', 'Rodríguez', 'Sánchez', 'Ramírez', 'Cruz',
            'Flores', 'Gómez', 'Díaz', 'Vázquez', 'Moreno', 'Álvarez', 'Torres', 'Mendoza', 'Ruiz', 'Aguilar'];
        $calles = ['Av. Reforma', 'Calle Hidalgo', 'Av. Juárez', 'Calle Morelos', 'Blvd. Independencia',
            'Av. Universidad', 'Calle Allende', 'Av. Insurgentes', 'Calle Zaragoza', 'Av. Tecnológico'];
        $ciudades = ['CDMX', 'Puebla', 'Guadalajara', 'Toluca', 'Querétaro', 'Monterrey', 'Pachuca', 'Cuernavaca', 'León', 'Mérida'];

        for ($i = 11; $i <= 100; $i++) {
            $nombre = $nombres[$i % 20];
            $paterno = $apellidos[($i * 3) % 20];
            $materno = $apellidos[($i * 7 + 5) % 20];

            $clientes[] = [
                $nombre,
                $paterno,
                $materno,
                Str::lower(Str::ascii($nombre.'.'.$paterno)).$i.'@example.com',
                '5512345'.str_pad($i, 3, '0', STR_PAD_LEFT),
                $calles[$i % 10].' '.($i * 13).', '.$ciudades[($i * 3) % 10],
            ];
        }

        $now = Carbon::now();

        Cliente::insert(array_map(fn ($c) => [
            'nombre' => $c[0],
            'apellido_paterno' => $c[1],
            'apellido_materno' => $c[2],
            'email' => $c[3],
            'telefono' => $c[4],
            'direccion' => $c[5],
            'created_at' => $now,
            'updated_at' => $now,
        ], $clientes));
    }
}
