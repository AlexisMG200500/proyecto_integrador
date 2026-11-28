<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            ['Alexis', 'Alexis', 'alexis.morgomez20@gmail.com'],
            ['María López', 'mlopez', 'maria.lopez@example.com'],
            ['Juan Pérez', 'jperez', 'juan.perez@example.com'],
            ['Ana Martínez', 'amartinez', 'ana.martinez@example.com'],
            ['Carlos Hernández', 'chernandez', 'carlos.hernandez@example.com'],
            ['Laura García', 'lgarcia', 'laura.garcia@example.com'],
            ['Pedro Ramírez', 'pramirez', 'pedro.ramirez@example.com'],
            ['Sofía Torres', 'storres', 'sofia.torres@example.com'],
            ['Miguel Flores', 'mflores', 'miguel.flores@example.com'],
            ['Valeria Cruz', 'vcruz', 'valeria.cruz@example.com'],
        ];

        // Se generan 90 usuarios más para completar 100 registros
        $nombres = ['Andrea', 'Bruno', 'Camila', 'Daniel', 'Estefanía', 'Felipe', 'Gloria', 'Héctor', 'Irene', 'Jaime',
            'Karen', 'Lorenzo', 'Marisol', 'Norberto', 'Ofelia', 'Ramón', 'Susana', 'Tadeo', 'Úrsula', 'Ximena'];
        $apellidos = ['López', 'Pérez', 'Martínez', 'Hernández', 'García', 'Ramírez', 'Torres', 'Flores', 'Cruz', 'Reyes',
            'Morales', 'Jiménez', 'Castillo', 'Ortiz', 'Romero', 'Medina', 'Herrera', 'Vargas', 'Rojas', 'Silva'];

        for ($i = 11; $i <= 100; $i++) {
            $nombre = $nombres[$i % 20];
            $apellido = $apellidos[($i * 3) % 20];
            $usuario = Str::lower(Str::ascii(Str::substr($nombre, 0, 1).$apellido)).$i;

            $usuarios[] = [$nombre.' '.$apellido, $usuario, $usuario.'@example.com'];
        }

        $password = Hash::make('12345');

        // updateOrCreate evita duplicar usuarios si el seeder se ejecuta más de una vez
        foreach ($usuarios as [$nombre, $usuario, $email]) {
            Usuario::updateOrCreate(
                ['email' => $email],
                ['nombre' => $nombre, 'usuario' => $usuario, 'password' => $password]
            );
        }
    }
}
