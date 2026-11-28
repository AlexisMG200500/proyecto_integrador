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

        // Se generan 90 ventas más para completar 100 registros
        // [producto, características, precio unitario]
        $catalogo = [
            ['laptop Lenovo IdeaPad', 'AMD Ryzen 5, 8GB RAM, 256GB SSD', 11800],
            ['laptop Acer Aspire', 'Intel i3, 8GB RAM, 512GB SSD', 9500],
            ['impresora HP DeskJet', 'Multifuncional, WiFi', 1900],
            ['impresora Brother HL', 'Láser monocromática', 3500],
            ['monitor LG 27 pulgadas', 'QHD, IPS, 75Hz', 4900],
            ['monitor AOC 22 pulgadas', 'Full HD, VGA, HDMI', 2100],
            ['teclado Redragon Kumara', 'Mecánico, RGB', 850],
            ['mouse Razer DeathAdder', 'Óptico, 6400 DPI', 700],
            ['disco SSD Kingston 480GB', 'SATA III, 2.5 pulgadas', 750],
            ['disco SSD Samsung 970 EVO', 'NVMe M.2, 1TB', 1900],
            ['memoria RAM Corsair 16GB', 'DDR4, 3600MHz', 1200],
            ['tarjeta de video GTX 1650', '4GB GDDR6', 3900],
            ['tarjeta madre ASUS Prime', 'Socket AM4, ATX', 2600],
            ['procesador Intel i5 12400', '6 núcleos, 4.4GHz', 3700],
            ['fuente de poder Corsair 650W', '80 Plus Bronze', 1500],
            ['router Huawei AX3', 'WiFi 6, doble banda', 1300],
            ['switch TP-Link 8 puertos', 'Gigabit, no administrable', 450],
            ['No Break APC 750VA', 'Regulador integrado, 6 contactos', 1800],
            ['bocinas Logitech Z313', '2.1, 25W', 950],
            ['webcam Logitech C920', 'Full HD 1080p, micrófono', 1400],
        ];
        // Mismas listas que ClienteSeeder, así el nombre del cliente coincide con uno existente
        $nombres = ['Alberto', 'Beatriz', 'César', 'Diana', 'Eduardo', 'Elena', 'Francisco', 'Guadalupe', 'Hugo', 'Isabel',
            'Javier', 'Karla', 'Leonardo', 'Mónica', 'Nicolás', 'Olivia', 'Pablo', 'Rosa', 'Sergio', 'Teresa'];
        $apellidos = ['García', 'Hernández', 'López', 'Martínez', 'González', 'Pérez', 'Rodríguez', 'Sánchez', 'Ramírez', 'Cruz',
            'Flores', 'Gómez', 'Díaz', 'Vázquez', 'Moreno', 'Álvarez', 'Torres', 'Mendoza', 'Ruiz', 'Aguilar'];

        for ($i = 11; $i <= 100; $i++) {
            [$producto, $caracteristicas, $precioUnitario] = $catalogo[$i % 20];
            $cantidad = $i % 4 + 1;

            $ventas[] = [
                'V-'.str_pad($i, 4, '0', STR_PAD_LEFT),
                (string) $cantidad,
                (string) ($precioUnitario * $cantidad),
                $caracteristicas,
                'Venta de '.$producto,
                $nombres[$i % 20].' '.$apellidos[($i * 3) % 20].' '.$apellidos[($i * 7 + 5) % 20],
            ];
        }

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
