<?php

namespace App\Exports;

// use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use App\Models\Venta;

class VentasExport implements FromView, ShouldAutoSize
{
    public function view(): View{
        $ventas = Venta::all();
        return view('ventas.export',[
            'ventas'=>$ventas
        ]);
    }
}