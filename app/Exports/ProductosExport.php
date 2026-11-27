<?php

namespace App\Exports;

use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use App\Models\Producto;

class ProductosExport implements FromView, ShouldAutoSize
{
    use Exportable;
    public function view(): View{
        $productos = Producto::all();        
        return view('productos.export',[
            'productos'=>$productos
        ]);
    }
}
