<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
