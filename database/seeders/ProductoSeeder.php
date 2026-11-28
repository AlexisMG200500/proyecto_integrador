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

        // Se generan 90 productos más para completar 100 registros
        // [producto, prefijo de serie, características, precio]
        $catalogo = [
            ['Laptop Lenovo IdeaPad', 'LN-IP', 'AMD Ryzen 5, 8GB RAM, 256GB SSD', '11800'],
            ['Laptop Acer Aspire', 'AC-AS', 'Intel i3, 8GB RAM, 512GB SSD', '9500'],
            ['Impresora HP DeskJet', 'HP-DJ', 'Multifuncional, WiFi', '1900'],
            ['Impresora Brother HL', 'BR-HL', 'Láser monocromática', '3500'],
            ['Monitor LG 27 pulgadas', 'LG-MN', 'QHD, IPS, 75Hz', '4900'],
            ['Monitor AOC 22 pulgadas', 'AO-MN', 'Full HD, VGA, HDMI', '2100'],
            ['Teclado Redragon Kumara', 'RD-KM', 'Mecánico, RGB', '850'],
            ['Mouse Razer DeathAdder', 'RZ-DA', 'Óptico, 6400 DPI', '700'],
            ['Disco SSD Kingston 480GB', 'KG-SS', 'SATA III, 2.5 pulgadas', '750'],
            ['Disco SSD Samsung 970 EVO', 'SM-SS', 'NVMe M.2, 1TB', '1900'],
            ['Memoria RAM Corsair 16GB', 'CR-RM', 'DDR4, 3600MHz', '1200'],
            ['Tarjeta de video GTX 1650', 'NV-GT', '4GB GDDR6', '3900'],
            ['Tarjeta madre ASUS Prime', 'AS-PM', 'Socket AM4, ATX', '2600'],
            ['Procesador Intel i5 12400', 'IN-I5', '6 núcleos, 4.4GHz', '3700'],
            ['Fuente de poder Corsair 650W', 'CR-FP', '80 Plus Bronze', '1500'],
            ['Router Huawei AX3', 'HW-AX', 'WiFi 6, doble banda', '1300'],
            ['Switch TP-Link 8 puertos', 'TP-SW', 'Gigabit, no administrable', '450'],
            ['No Break APC 750VA', 'AP-NB', 'Regulador integrado, 6 contactos', '1800'],
            ['Bocinas Logitech Z313', 'LG-BZ', '2.1, 25W', '950'],
            ['Webcam Logitech C920', 'LG-WC', 'Full HD 1080p, micrófono', '1400'],
        ];
        $fallas = ['No enciende', 'Pantalla con líneas', 'Atasco de papel', 'Sin señal', 'Teclas no responden',
            'Se sobrecalienta', 'Sectores dañados', 'Pantallazo azul', 'No arranca', 'Se desconecta',
            'Ruido extraño', 'Puerto USB dañado', 'No detecta dispositivo', 'Batería no carga', 'Sin falla'];

        for ($i = 11; $i <= 100; $i++) {
            [$nombre, $prefijo, $caracteristicas, $precio] = $catalogo[$i % 20];

            $productos[] = [
                $nombre,
                $prefijo.'-'.str_pad($i, 4, '0', STR_PAD_LEFT),
                $caracteristicas,
                $fallas[$i % 15],
                (string) (($i * 7) % 15 + 1),
                $precio,
            ];
        }

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
