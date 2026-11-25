<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = [
            ['José', 'Martínez', 'López', '5598765401', 'Calle Pino 12, CDMX'],
            ['Claudia', 'Gutiérrez', 'Salas', '5598765402', 'Av. Central 230, Ecatepec'],
            ['Fernando', 'Ramos', 'Ibarra', '5598765403', 'Calle Roble 8, Naucalpan'],
            ['Patricia', 'Domínguez', 'Fuentes', '5598765404', 'Av. Las Torres 55, Toluca'],
            ['Héctor', 'Luna', 'Cervantes', '5598765405', 'Calle Cedro 101, Tlalnepantla'],
            ['Verónica', 'Ríos', 'Molina', '5598765406', 'Av. Lomas 640, CDMX'],
            ['Alejandro', 'Campos', 'Ponce', '5598765407', 'Calle Olmo 33, Puebla'],
            ['Lucía', 'Estrada', 'Padilla', '5598765408', 'Av. Del Sol 21, Querétaro'],
            ['Raúl', 'Sandoval', 'Acosta', '5598765409', 'Calle Fresno 77, Pachuca'],
            ['Carmen', 'Núñez', 'Valdez', '5598765410', 'Av. Primavera 15, Cuernavaca'],
        ];

        $now = Carbon::now();

        Empleado::insert(array_map(fn ($e) => [
            'nombre' => $e[0],
            'apellido_paterno' => $e[1],
            'apellido_materno' => $e[2],
            'telefono' => $e[3],
            'direccion' => $e[4],
            'created_at' => $now,
            'updated_at' => $now,
        ], $empleados));
    }
}
