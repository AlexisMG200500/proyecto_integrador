<?php

namespace Database\Seeders;

use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['Laptop HP Pavilion', 'HP-PV-0001', 'Intel i5, 8GB RAM, 512GB SSD', 'No enciende', '3', '12500'],
            ['Laptop Dell Inspiron', 'DL-IN-0002', 'Intel i7, 16GB RAM, 1TB SSD', 'Pantalla con líneas', '2', '18900'],
            ['Impresora Epson L3250', 'EP-L3-0003', 'Multifuncional, tinta continua', 'Atasco de papel', '5', '4200'],
            ['Monitor Samsung 24 pulgadas', 'SM-MN-0004', 'Full HD, 75Hz, HDMI', 'Sin señal', '4', '2800'],
            ['Teclado Logitech K120', 'LG-K1-0005', 'USB, alámbrico', 'Teclas no responden', '10', '250'],
            ['Mouse Logitech M170', 'LG-M1-0006', 'Inalámbrico, 1000 DPI', 'Doble clic', '12', '220'],
            ['Disco Duro Seagate 1TB', 'SG-HD-0007', 'SATA, 7200 RPM', 'Sectores dañados', '6', '1100'],
            ['Memoria RAM Kingston 8GB', 'KG-RM-0008', 'DDR4, 3200MHz', 'Pantallazo azul', '8', '650'],
            ['Fuente de poder EVGA 600W', 'EV-FP-0009', '80 Plus White', 'No arranca', '3', '1300'],
            ['Router TP-Link Archer C6', 'TP-AR-0010', 'Doble banda, AC1200', 'Se desconecta', '7', '900'],
        ];

        $now = Carbon::now();

        Producto::insert(array_map(fn ($p) => [
            'producto' => $p[0],
            'serie' => $p[1],
            'caracteristicas' => $p[2],
            'falla' => $p[3],
            'cantidad' => $p[4],
            'precio' => $p[5],
            'created_at' => $now,
            'updated_at' => $now,
        ], $productos));
    }
}
