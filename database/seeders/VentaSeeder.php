<?php

namespace Database\Seeders;

use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ventas = [
            ['V-0001', '1', '12500', 'Intel i5, 8GB RAM, 512GB SSD', 'Venta de laptop HP Pavilion', 'Roberto Sánchez Gómez'],
            ['V-0002', '2', '5600', 'Full HD, 75Hz, HDMI', 'Venta de monitores Samsung', 'Fernanda Morales Ruiz'],
            ['V-0003', '1', '4200', 'Multifuncional, tinta continua', 'Venta de impresora Epson', 'Jorge Castillo Vega'],
            ['V-0004', '3', '750', 'USB, alámbrico', 'Venta de teclados Logitech', 'Daniela Ortiz Mendoza'],
            ['V-0005', '1', '18900', 'Intel i7, 16GB RAM, 1TB SSD', 'Venta de laptop Dell Inspiron', 'Luis Reyes Navarro'],
            ['V-0006', '2', '1300', 'DDR4, 3200MHz', 'Venta de memorias RAM Kingston', 'Gabriela Jiménez Rojas'],
            ['V-0007', '1', '1100', 'SATA, 7200 RPM', 'Venta de disco duro Seagate', 'Ricardo Vargas Silva'],
            ['V-0008', '4', '880', 'Inalámbrico, 1000 DPI', 'Venta de mouse Logitech', 'Paola Romero Aguilar'],
            ['V-0009', '1', '1300', '80 Plus White', 'Venta de fuente de poder EVGA', 'Andrés Medina Castro'],
            ['V-0010', '2', '1800', 'Doble banda, AC1200', 'Venta de routers TP-Link', 'Mariana Herrera Delgado'],
        ];

        $now = Carbon::now();

        Venta::insert(array_map(fn ($v) => [
            'venta' => $v[0],
            'cantidad' => $v[1],
            'precio' => $v[2],
            'caracteristicas' => $v[3],
            'descripcion' => $v[4],
            'cliente' => $v[5],
            'created_at' => $now,
            'updated_at' => $now,
        ], $ventas));
    }
}
